<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables,Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(CategoryPost::with([
                'post' => function ($query) {
                    return $query->withTrashed();
                },
                ])->withTrashed())
                ->addColumn('name', function (CategoryPost $categoryPost) {
                    return $categoryPost->title;
                })
                ->addColumn('description', function (CategoryPost $categoryPost) {
                    return $categoryPost->category->name;
                })
                ->addColumn('post_count', function (CategoryPost $categoryPost) {
                    return $categoryPost->user->name;
                })
                ->addColumn('created_at', function (CategoryPost $categoryPost) {
                    return Carbon::parse($categoryPost->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (CategoryPost $categoryPost) {
                    return \view('backend.post.button_action', compact('post'));
                })
                ->addColumn('status', function (CategoryPost $categoryPost) {
                    if ($categoryPost->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            
            return view('backend.post-category.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
