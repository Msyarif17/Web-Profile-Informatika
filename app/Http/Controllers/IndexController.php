<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Partner;
use App\Models\WebInfo;
use App\Models\SocialMedia;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Models\PeminatJurusan;
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
        $webinfo = WebInfo::first();
        $partner = $this->partner();
        $peminat = PeminatJurusan::pluck('peminat','tahun_akademik')->all();
        $footer = Footer::get()->all();
        $socials = SocialMedia::all();
        $pengumuman = CategoryPost::where('slug', 'pengumuman')->orWhere('slug','Pengumuman')->latest()->first();
        $prestasi = CategoryPost::where('slug', 'prestasi')->orWhere('slug','Prestasi')->latest()->first();
        if ($pengumuman)
            $pengumuman = $data->where('category_post_id', $pengumuman->id)->latest()->take(3)->get();
        else
            $pengumuman = [];
        if ($prestasi)
            $prestasi = $data->where('category_post_id', $prestasi->id)->latest()->take(3)->get();
        else
            $pengumuman = [];
        $posts = Post::latest()->get();
        // dd($posts);
        $cui = CustomUserInterface::where('isActive', true)->first();
        if ($cui) {
            return view('frontend.index', compact('webinfo','cui', 'posts', 'pengumuman', 'nav', 'banners', 'slide', 'prestasi', 'partner','peminat','footer','socials'));
        }
        return 'tema tidak ditemukan, mohon setting tema terlebih dahulu,<a href="' . route('login') . '" target="_blank">login</a>';
    }
    private function partner()
    {
        $partner = Partner::get();
        return $partner;
    }
}
