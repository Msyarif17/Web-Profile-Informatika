<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CustomUserInterface;

class IndexController extends Controller
{
    public function index(){
        $data = Post::with(['tag','category']);
        
        $pengumuman = $data->whereHas('category',function ($query){
            $query->where('name','Berita');
        })->latest()->get();
        $posts = $data->latest()->get();
        $cui = CustomUserInterface::where('isActive',true)->first();
        if($cui){
            return view('frontend.index',compact('cui','posts','pengumuman'));
        }
        return 'tema tidak ditemukan, mohon setting tema terlebih dahulu,<a href="'.route('dash.cui.index').'" target="_blank">login</a>';
    }
}
