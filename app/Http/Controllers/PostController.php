<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;

class PostController extends Controller
{

    public function post(Post $post, Request $request)
    {
        $nav = NavigationController::nav();
        $request->visitor()->visit($post);
        $cui = CustomUserInterface::where('isActive', true)->first();
        $posts = Post::latest()->get();
        $content = $post->first();
        return \view('frontend.post', \compact('content', 'cui', 'posts', 'nav'));
    }
    public function postManager($selection = 'berita', Request $request)
    {
        $banner = Post::latest()->first();
        $nav = NavigationController::nav();
        $cui = CustomUserInterface::where('isActive', true)->first();
        if ($selection == 'berita') {
            $posts = Post::latest()->paginate(5);
        } elseif ($selection == 'arsip') {
            $request->validate([
                'year' => 'required|numeric'
            ]);
            $posts = Post::whereYear('created_at', $request->year)->latest()->paginate(5);
        } else {
            $category = CategoryPost::where('slug', $selection)->first();
            $posts = Post::with([
                'category' => function ($query) use ($selection) {
                    return $query;
                },
                'tag' => function ($query) {
                    return $query;
                }
            ])->where('category_post_id',$category->id)->latest()->paginate(5);
        }
        $category = CategoryPost::with([
            'post' => function ($query) {
                return $query->latest();
            }
        ])->get();
        $arsip = Post::latest()->get()->groupBy(function ($d) {
            return Carbon::parse($d->created_at)->format('Y');
        })->map(function ($value, $key) {
            return $value->count();
        });
        // dd($arsip);
        if (!$posts) {
            $message = '404 Not Found';
            if ($cui) {
                return view('frontend.component.errors.404', compact(
                    'message',
                    'cui',
                    'nav'
                ));
            }
            return 'tema tidak ditemukan, mohon setting tema terlebih dahulu,<a href="' . route('login') . '" target="_blank">login</a>';
        }
        // dd($posts);
        return view('frontend.post-manager', compact(
            'banner',
            'cui',
            'nav',
            'posts',
            'category',
            'arsip'
        ));
    }
}
