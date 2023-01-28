<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Tag::with([
                'post' => function ($query) {
                    return $query->withTrashed();
                },
            ])->withTrashed())
                ->addColumn('name', function (Tag $tag) {
                    return $tag->title;
                })
                ->addColumn('description', function (Tag $tag) {
                    return $tag->category->name;
                })
                ->addColumn('post_count', function (Tag $tag) {
                    return $tag->user->name;
                })
                ->addColumn('created_at', function (Tag $tag) {
                    return Carbon::parse($tag->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (Tag $tag) {
                    return \view('backend.post.button_action', compact('post'));
                })
                ->addColumn('status', function (Tag $tag) {
                    if ($tag->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.post-category.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'string',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        CategoryPost::create($input);
        return back()->with('success', 'Post Category Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = CategoryPost::find($id);
        return view('backend.post-category.create', compact('categoryPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'string',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);

        CategoryPost::find($id)->update($input);
        return back()->with('success', 'Post Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryPost::find($id)->delete();
        return redirect()->route('dash.category-post.index')->with('success', 'Category Post deleted successfully');
    }
    public function restore($id)
    {
        CategoryPost::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.category-post.index')->with('success', 'Category Post restored successfully');
    }
}
