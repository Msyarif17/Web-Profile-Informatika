<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Shetabit\Visitor\Visitor;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(DataTables $datatables, Request $request)
    {
        $visit = Visit::get();
        $post = Post::get();

        $data = [$visit, $post];
        foreach ($data as $key => $value) {
            $a = $value
                ->groupBy(function ($d) {
                    return Carbon::parse($d->created_at)->format('d');
                })
                ->map(function ($visit, $key) {
                    return $visit->count();
                })
                ->toArray();
            foreach (range(1, Carbon::now()->daysInMonth) as $i) {
                $b[$i] = 0;
            }
            // dd([$b, $a])

            $data[$key] = array_replace($b, $a);
        }
        $user = User::get()->count();
        $post = Post::get()->count();
        $online = User::online()->get()->count();
        $maintenance = Storage::disk('framework')->exists('maintenance');
        if ($request->ajax()) {
            return $datatables->of(Post::with([
                'category' => function ($query) {
                    return $query->withTrashed();
                },
                'user' => function ($query) {
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
        return view('backend.index', compact(
            'data',
            'online',
            'user',
            'post',
            'maintenance'
        ));
    }
}
