<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommentController as CController;

use function PHPUnit\Framework\isNull;

class CommentController extends Controller
{
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            
            return $datatables->of(Comment::with([
                'post' => function ($query) {
                    return $query->withTrashed();
                }, 
                'user' => function ($query) {
                    return $query->withTrashed();
                },
                'parent' => function ($query) {
                    return $query->with(['user','post'])->withTrashed();
                },

                'childrent' => function ($query) {
                    return $query->with(['user', 'post'])->withTrashed();
                },
            ])->withTrashed())
                ->addColumn('user.name', function (Comment $comment) {
                    return $comment->user->name;
                })
                ->addColumn('user.role.name', function (Comment $comment) {
                    return implode(", ", $comment->user->getRoleNames() ? $comment->user->getRoleNames()->toArray() : []);
                })
                ->addColumn('post.title', function (Comment $comment) {
                    return Str::limit($comment->post->title,20);
                })
                ->addColumn('content', function (Comment $comment) {
                    return $comment->content;
                })
                ->addColumn('reply', function (Comment $comment) {
                    return !empty($comment->parent->toArray())  ? $comment->childrent->user->name: '-';
                    // return dd($);
                })
                ->addColumn('created_at', function (Comment $comment) {
                    return Carbon::parse($comment->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (Comment $comment) {
                    return \view('backend.comment.button_action', compact('comment'));
                })
                ->addColumn('status', function (Comment $comment) {
                    if ($comment->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.comment.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        $comment = Comment::with(['post','user','parent','childrent'])->where('id',$r->id)->first();
        // dd($comment);
        return view('backend.comment.create',compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $comment = new CController;
        return $comment->send(Post::find($request->post_id),$request, $request->parent_id);
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
        $comment = Comment::find($id);
        return view('backend.comment.create', compact('comment'));
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

        Comment::find($id)->update($input);
        return back()->with('success', 'Comment Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('dash.comment.index')->with('success', 'tag Post deleted successfully');
    }
    public function forceDestroy($id)
    {
        Comment::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.comment.index')->with('success', 'Category Post Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Comment::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.comment.index')->with('success', 'tag Post restored successfully');
    }
}
