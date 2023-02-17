<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;
use App\Models\Post;
use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Banner::withTrashed())
                ->addColumn('title_1', function (Banner $banner) {
                    return $banner->title_1;
                })
                ->addColumn('image', function (Banner $banner) {
                    return asset('storage'.$banner->image);
                })
                
                ->addColumn('action', function (Banner $banner) {
                    return \view('backend.banner.button_action', compact('banner'));
                })
                ->addColumn('status', function (Banner $banner) {
                    if ($banner->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.banner.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::pluck('title','id')->all();
        $page = Page::pluck('title','id')->all();
        return view('backend.banner.create',compact('post','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_1' => 'required|string',
            'title_2' => 'required|string',
            'image' => 'required|image',
            'button_title' => 'required',
            'button_color' => 'required',
            'text_button_color' => 'required',
        ]);
        $input = $request->all();
        $image = $request->file('image');
        $input['post_id'] = $request->post_id[0] == null ? null : implode("", $input['post_id']);
        $input['page_id'] = $request->page_id[0] == null ? null : implode("", $input['page_id']);
        if ($image) {
            $image->storeAs('public/banner/image/', 'banner-' . $image->hashName());
            $input['image'] = '/banner/image/banner-' . $image->hashName();
        }
        
        Banner::create($input);
        return back()->with('success', 'Banner Created successfully');
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
        $banner = Banner::find($id);
        $post = Post::pluck('title', 'id')->all();
        $page = Page::pluck('title', 'id')->all();
        return view('backend.banner.edit', compact('banner','post','page'));
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
        $this->validate($request, [
            'title_1' => 'required|string',
            'title_2' => 'required|string',
        ]);
        $input = $request->all();
        $image = $request->file('image');
        $input['post_id'] = $request->post_id[0] == null ? null : implode("", $input['post_id']);
        $input['page_id'] = $request->page_id[0] == null ? null : implode("", $input['page_id']);
        
        if ($image) {
            $image->storeAs('public/banner/image/', 'banner-' . $image->hashName());
            $input['image'] = '/banner/image/banner-' . $image->hashName();
        }

        Banner::find($id)->update($input);
        return back()->with('success', 'Banner Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect()->route('dash.banner.index')->with('success', 'Banner deleted successfully');
    }
    public function forceDestroy($id)
    {
        $banner = Banner::withTrashed()->find($id);
        $img = 'public' . $banner->toArray()['image'];
        if (Storage::exists($img)) {
            Storage::delete([$img]);
        }

        $banner->forceDelete();
        
        return redirect()->route('dash.banner.index')->with('success', 'Banner Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Banner::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.banner.index')->with('success', 'Banner restored successfully');
    }
}
