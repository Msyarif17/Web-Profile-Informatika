<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;

class PostController extends Controller
{
    public function post(Post $post){
        Request::visitor()->visit($post);
        $cui = CustomUserInterface::where('isActive',true)->first();
        $posts = Post::latest()->get();
        $content = $post->first();
        return \view('frontend.post',\compact('content','cui','posts'));
    }
}
