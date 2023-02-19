<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;
use App\Http\Controllers\NavigationController;
use App\Models\CategoryPost;

class IndexController extends Controller
{
    public function index()
    {
        visitor()->visit();
        $data = Post::with(['tag', 'category']);
        $nav = NavigationController::nav();
        $banners = Banner::latest()->take(3)->get();
        $slide = 0;
        $partner = $this->partner();

        $pengumuman = CategoryPost::where('slug', 'pengumuman')->latest()->first();
        $prestasi = CategoryPost::where('slug', 'prestasi')->latest()->first();
        if ($pengumuman)
            $pengumuman = $data->where('category_post_id', $pengumuman->id)->latest()->get();
        else
            $pengumuman = [];
        if ($prestasi)
            $prestasi = $data->where('category_post_id', $prestasi->id)->latest()->get();
        else
            $pengumuman = [];
        $posts = Post::latest()->get();
        // dd($posts);
        $cui = CustomUserInterface::where('isActive', true)->first();
        if ($cui) {
            return view('frontend.index', compact('cui', 'posts', 'pengumuman', 'nav', 'banners', 'slide', 'prestasi', 'partner'));
        }
        return 'tema tidak ditemukan, mohon setting tema terlebih dahulu,<a href="' . route('login') . '" target="_blank">login</a>';
    }
    private function partner()
    {
        $partner = Partner::get();
        return $partner;
    }
}
