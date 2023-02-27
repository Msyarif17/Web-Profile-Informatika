<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use afrizalmy\BWI\BadWord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public static function get($post_id){
        $comment = Comment::where('post_id',$post_id)->get();
            // dd($post_id);
        return $comment;
    }
    public function send(Post $post, Request $request , $parent_id = null ){
        $request->validate([
            'content' => 'required|string',
        ]);
        $content = $request->all();
        $content['parent_id'] = $parent_id;
        $content['post_id'] = $post->id;
        $content['user_id'] = Auth::user()->id;
        // dd($content);
        if(BadWord::cek($content['content'])){
            return back()->withErrors('the words comments contain dirty words');
        }
        Comment::create($content);
        return back()->withSuccess('Comment has been send');
    }
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return back()->with('success', 'Comment deleted successfully');
    }
}
