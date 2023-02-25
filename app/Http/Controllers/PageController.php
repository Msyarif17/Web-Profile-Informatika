<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Footer;
use App\Models\CategoryMenu;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;
use App\Http\Controllers\NavigationController;
use App\Models\SocialMedia;
use App\Models\WebInfo;

class PageController extends Controller
{
    public function pageFinder($slug,Request $request){
        try{
            
            $page = Page::where('slug', $slug);
            $footer = Footer::get()->all();
            $cui = CustomUserInterface::where('isActive', true)->first();
            $posts = Post::latest()->get();
            $content = $page->first();
            $request->visitor()->visit($content);
            $socials = SocialMedia::all();
            $webinfo = WebInfo::first();
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
            if(!$content){
                return \abort(404,'Not Found');
            }
            return \view('frontend.post', \compact('content', 'cui', 'posts','nav','category','arsip','footer','webinfo','socials'));
        }catch(Exception $e){
            return \abort(500,$e);

        }
        
    }
}
