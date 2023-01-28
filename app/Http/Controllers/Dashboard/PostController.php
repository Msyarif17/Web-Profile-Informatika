<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        // $this->validate($request, [
        //     'title' => 'required',
        //     'content' => 'required',
        //     'category_post_id' => 'required|numeric',
        //     'thumbnail' => 'required|image',

        // ]);

        $input = $request->all();
        
        $image = $request->file('thumbnail');
        if($image){
            $image->storeAs('public/post/image/thumbnail/', 'thumbnail-' . $image->hashName());
            $input['thumbnail'] = '/post/image/thumbnail/thumbnail-' . $image->hashName();
        }
        
        $input['category_post_id'] = implode("", $request->category_post_id);
        
        $input['tag_id'] = $request->tag_id ? implode("", $request->tag_id):null;
        
        $input['slug'] = Str::slug($input['title']);
        
        $input['posted_by'] = Auth::user()->id;
        
        $image = $request->file('banner');
        if($image){
            $image->storeAs('public/post/image/banner/', 'banner-' . $image->hashName());
            $input['banner'] = '/post/image/banner/banner-' . $image->hashName();
        }
        
        
        
        Post::create($input);
        return redirect()->route('dash.post.index')->with('success', 'Post Created successfully');
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
