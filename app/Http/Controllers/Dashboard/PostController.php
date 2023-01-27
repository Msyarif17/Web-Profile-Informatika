<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Post::with([
                'category' => function ($query) {
                    return $query->withTrashed();
                },
                'user' => function ($query){
                    return $query->withTrashed();
                },
                'tag' => function ($query) {
                    return $query->withTrashed();
                }
                ])->withTrashed())
                ->addColumn('judul', function (Post $post) {
                    return $post->title;
                })
                ->addColumn('kategori', function (Post $post) {
                    return $post->category->name;
                })
                ->addColumn('created_by', function (Post $post) {
                    return $post->user->name;
                })
                ->addColumn('created_at', function (Post $post) {
                    return Carbon::parse($post->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (Post $post) {
                    return \view('backend.post.button_action', compact('post'));
                })
                ->addColumn('status', function (Post $post) {
                    if ($post->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            
            return view('backend.post.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryPost = CategoryPost::pluck('name', 'id')->all();
        $tag = Tag::pluck('name', 'id')->all();
        return view('backend.post.create', compact('categoryPost','tag'));
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
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|numeric',

        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
