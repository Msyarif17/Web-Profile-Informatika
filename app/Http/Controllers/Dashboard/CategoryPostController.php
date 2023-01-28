<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables,Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(CategoryPost::with([
                'post' => function ($query) {
                    return $query->withTrashed();
                },
                ])->withTrashed())
                ->addColumn('name', function (CategoryPost $categoryPost) {
                    return $categoryPost->name;
                })
                ->addColumn('description', function (CategoryPost $categoryPost) {
                    return Str::limit(strip_tags($categoryPost->description,100));
                })
                ->addColumn('post_count', function (CategoryPost $categoryPost) {
                    return $categoryPost->post->count();
                })
                ->addColumn('created_at', function (CategoryPost $categoryPost) {
                    return Carbon::parse($categoryPost->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (CategoryPost $categoryPost) {
                    return \view('backend.post-category.button_action', compact('categoryPost'));
                })
                ->addColumn('status', function (CategoryPost $categoryPost) {
                    if ($categoryPost->deleted_at) {
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
        $this->validate($request,[
            'name' => 'required|string',
        ]);
        $input = $request->all();
        $input['description'] = $input['description']? $input['description']:null;
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
        $categoryPost = CategoryPost::find($id);
        return view('backend.post-category.edit',compact('categoryPost'));
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
        return redirect()->route('dash.category-post.index')->with('success','Category Post deleted successfully');
    }
    public function forceDestroy($id){
        CategoryPost::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.category-post.index')->with('success', 'Category Post Permanently Deleted successfully');
    }
    public function restore($id){
        CategoryPost::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.category-post.index')->with('success', 'Category Post restored successfully');
    }
}
