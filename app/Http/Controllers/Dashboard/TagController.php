<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;

use Illuminate\Support\Str;
use App\Models\Tag;
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
                    return $tag->name;
                })
                ->addColumn('description', function (Tag $tag) {
                    return $tag->description;
                })
                ->addColumn('post_count', function (Tag $tag) {
                    return $tag->post->count();
                })
                ->addColumn('created_at', function (Tag $tag) {
                    return Carbon::parse($tag->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (Tag $tag) {
                    return \view('backend.post-tag.button_action', compact('tag'));
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

            return view('backend.post-tag.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post-tag.create');
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

        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        Tag::create($input);
        return back()->with('success', 'Post tag Created successfully');
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
        $tag = Tag::find($id);
        return view('backend.post-tag.create', compact('Tag'));
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

        Tag::find($id)->update($input);
        return back()->with('success', 'Post tag Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('dash.tag-post.index')->with('success', 'tag Post deleted successfully');
    }
    public function forceDestroy($id)
    {
        Tag::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.category-post.index')->with('success', 'Category Post Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Tag::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.tag-post.index')->with('success', 'tag Post restored successfully');
    }
}
