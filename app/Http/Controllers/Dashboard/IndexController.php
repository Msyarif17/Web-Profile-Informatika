<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(DataTables $datatables, Request $request){
        $data = new Post;
        if($data){
            $data->get()->groupBy(function($d) {
                return Carbon::parse($d->created_at)->format('m');
            });
            
        }
        else{
            $data = [];
        }
        if ($request->ajax()) {
            return $datatables->of(Post::with([
                'category' => function ($query) {
                    return $query->withTrashed();
                },
                'user' => function ($query){
                    return $query->withTrashed();
                },
                'tag' => function ($query) {
                    return $query->withTrashed();
                }
                ])->withTrashed())
                ->addColumn('judul', function (Post $post) {
                    return $post->title;
                })
                ->addColumn('kategori', function (Post $post) {
                    // dd($post->category);
                    return $post->category->name;
                })
                ->addColumn('created_by', function (Post $post) {
                    return $post->user->name;
                })
                ->addColumn('created_at', function (Post $post) {
                    return Carbon::parse($post->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (Post $post) {
                    return \view('backend.post.button_action', compact('post'));
                })
                ->addColumn('status', function (Post $post) {
                    if ($post->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('backend.index');
    }
    
}
