<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\CategoryMenu;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;
use App\Http\Controllers\NavigationController;

class PageController extends Controller
{
    public function pageFinder($slug,Request $request){
        $page = Page::where('slug', $slug);
        
        $cui = CustomUserInterface::where('isActive', true)->first();
        $posts = Post::latest()->get();
        $content = $page->first();
        $request->visitor()->visit($content);
        // dd($request->is('page*'));
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
        $nav = NavigationController::nav();
        return \view('frontend.post', \compact('content', 'cui', 'posts','nav','category','arsip'));
    }
}
