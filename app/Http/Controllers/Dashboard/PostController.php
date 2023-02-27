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
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {
        
        $data = Post::with([
            'category' => function ($query) {
                return $query->withTrashed();
            },
            'user' => function ($query) {
                return $query->withTrashed();
            },
            'tag' => function ($query) {
                return $query->withTrashed();
            }
        ]);
        $roleUser = Auth::user()->getRoleNames()->toArray();
        // dd($roleUser);
        switch(implode("",$roleUser)){
            case 'Super Admin':
                
                $data->withTrashed();
                break;
            case 'Admin':
                $data->withTrashed();
                break;
            case 'Dosen':
                $data->where('posted_by',Auth::user()->id)->withTrashed();
                break;
        }
        if ($request->ajax()) {
            return $datatables->of($data)
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
            'category_post_id' => 'required',
            'thumbnail' => 'required',

        ]);

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with([
            'category' => function ($query) {
                return $query->withTrashed();
            },
            'user' => function ($query) {
                return $query->withTrashed();
            },
            'tag' => function ($query) {
                return $query->withTrashed();
            }
        ])->find($id);

        $categoryPost = CategoryPost::pluck('name', 'id')->all();
        $tag = Tag::pluck('name', 'id')->all();
        return view('backend.post.edit', compact('categoryPost','post', 'tag'));
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
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = Post::find($id);
        $input = $request->all();
        
        $image = $request->file('thumbnail');
        if($image){
            $image->storeAs('public/post/image/thumbnail/', 'thumbnail-' . $image->hashName());
            $input['thumbnail'] = '/post/image/thumbnail/thumbnail-' . $image->hashName();
        }
        
        $input['category_post_id'] = $request->category_post_id[0]? implode("", $request->category_post_id):$post->first()->category_post_id;
        
        $input['tag_id'] = $request->tag_id ? implode("", $request->tag_id):$post->first()->tag_id;
        
        $input['slug'] = Str::slug($input['title']);
        
        $input['posted_by'] = Auth::user()->id;
        
        $image = $request->file('banner');
        if($image){
            $image->storeAs('public/post/image/banner/', 'banner-' . $image->hashName());
            $input['banner'] = '/post/image/banner/banner-' . $image->hashName();
        }
        
        $post->update($input);
        return redirect()->route('dash.post.index')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('dash.post.index')->with('success', 'Post deleted successfully');
    }
    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->find($id);
        $thumbnail = 'public'.$post->toArray()['thumbnail'];
        $banner = 'public'.$post->toArray()['banner'];
        if(Storage::exists($thumbnail)||Storage::exists($banner)){
            Storage::delete([$thumbnail,$banner]);
        }

        $post->forceDelete();
        
        return redirect()->route('dash.post.index')->with('success', 'Post Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Post::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.post.index')->with('success', 'Post restored successfully');
    }
}
