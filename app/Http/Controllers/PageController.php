<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\CategoryMenu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;

class PageController extends Controller
{
    public function pageFinder(Page $page,Request $request){
        $cui = CustomUserInterface::where('isActive', true)->first();
        $posts = Post::latest()->get();
        $content = $page->first();
        $nav = NavigationController::nav();
        return \view('frontend.post', \compact('content', 'cui', 'posts','nav'));
    }
}
