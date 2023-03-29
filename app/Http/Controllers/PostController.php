<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Footer;
use App\Models\Comment;
use App\Models\WebInfo;
use App\Models\SocialMedia;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\CustomUserInterface;
use function PHPUnit\Framework\isNull;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NavigationController;

class PostController extends Controller
{

    public function post($slug, Request $request)
    {
        $content = Post::where('slug',$slug)->first();
        $socials = SocialMedia::all();
        $footer = Footer::get()->all();
        $comment = CommentController::get($content->id);
        $nav = NavigationController::nav();
        $request->visitor()->visit($content);
        $cui = CustomUserInterface::where('isActive', true)->first();
        $webinfo = WebInfo::first();
        $posts = Post::latest()->take(3)->get();
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
        // dd(Comment::all());
        return \view('frontend.post', \compact('footer','content', 'cui', 'posts', 'nav','comment','category','arsip','webinfo','socials'));
    }
    public function postManager($selection = 'berita', Request $request)
    {
        $banner = Post::latest()->first();
        $socials = SocialMedia::all();
        $webinfo = WebInfo::first();
        $footer = Footer::get()->all();
        $nav = NavigationController::nav();
        $cui = CustomUserInterface::where('isActive', true)->first();
        if ($selection == 'berita') {
            $posts = Post::with('comment')->latest()->paginate(6);
        } elseif ($selection == 'arsip') {
            $request->validate([
                'year' => 'required|numeric'
            ]);
            $posts = Post::with('comment')->whereYear('created_at', $request->year)->latest()->paginate(5);
        } else {
            $category = CategoryPost::where('slug', $selection)->first();
            $posts = Post::with([
                'category' => function ($query) use ($selection) {
                    return $query;
                },
                'tag' => function ($query) {
                    return $query;
                },
                'comment' 
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
        // dd();
        if (count($posts) == 0) {
            $message = '404 Not Found';
            if ($cui) {
                return view('frontend.component.errors.404', compact(
                    'message',
                    'cui',
                    'webinfo',
                    'footer',
                    'socials',
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
            'webinfo',
            'footer',
            'socials',
            'arsip'
        ));
    }
}
