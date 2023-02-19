<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;
use App\Http\Controllers\NavigationController;

class IndexController extends Controller
{
    public function index()
    {
        visitor()->visit();
        $data = Post::with(['tag', 'category']);
        $nav = NavigationController::nav();
        $banners = Banner::latest()->take(3)->get();
        $slide = 0;
        $pengumuman = $data->whereHas('category', function ($query) {
            $query->where('name', 'Pengumuman');
        })->latest()->get();
        $prestasi = $data->whereHas('category', function ($query) {
            $query->where('name', 'Prestasi');
        })->latest()->get();
        $posts = Post::latest()->get();
        // dd($posts);
        $cui = CustomUserInterface::where('isActive', true)->first();
        if ($cui) {
            return view('frontend.index', compact('cui', 'posts', 'pengumuman', 'nav', 'banners', 'slide','prestasi'));
        }
        return 'tema tidak ditemukan, mohon setting tema terlebih dahulu,<a href="' . route('login') . '" target="_blank">login</a>';
    }
}
