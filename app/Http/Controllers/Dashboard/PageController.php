<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Models\Categorypage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Page::with([
                'user' => function ($query) {
                    return $query->withTrashed();
                },
            ])->withTrashed())
                ->addColumn('judul', function (Page $page) {
                    return $page->title;
                })
                ->addColumn('created_by', function (Page $page) {
                    return $page->user->name;
                })
                ->addColumn('created_at', function (Page $page) {
                    return Carbon::parse($page->created_at)->format('l, d F Y, H:m A');
                })
                ->addColumn('action', function (Page $page) {
                    return \view('backend.page.button_action', compact('page'));
                })
                ->addColumn('status', function (Page $page) {
                    if ($page->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.page.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',

        ]);

        $input = $request->all();

        $image = $request->file('thumbnail');
        if ($image) {
            $image->storeAs('public/page/image/thumbnail/', 'thumbnail-' . $image->hashName());
            $input['thumbnail'] = '/page/image/thumbnail/thumbnail-' . $image->hashName();
        }


        $input['slug'] = Str::slug($input['title']);

        $input['posted_by'] = Auth::user()->id;

        $image = $request->file('banner');
        if ($image) {
            $image->storeAs('public/page/image/banner/', 'banner-' . $image->hashName());
            $input['banner'] = '/page/image/banner/banner-' . $image->hashName();
        }

        Page::create($input);
        return redirect()->route('dash.page.index')->with('success', 'page Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::with([

            'user' => function ($query) {
                return $query->withTrashed();
            },
        ])->find($id);

        return view('backend.page.edit', compact('page'));
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
        

        $input = $request->all();

        $image = $request->file('thumbnail');
        if ($image) {
            $image->storeAs('public/page/image/thumbnail/', 'thumbnail-' . $image->hashName());
            $input['thumbnail'] = '/page/image/thumbnail/thumbnail-' . $image->hashName();
        }

        $input['slug'] = Str::slug($input['title']);

        $input['posted_by'] = Auth::user()->id;

        $image = $request->file('banner');
        if ($image) {
            $image->storeAs('public/page/image/banner/', 'banner-' . $image->hashName());
            $input['banner'] = '/page/image/banner/banner-' . $image->hashName();
        }

        Page::find($id)->update($input);
        return redirect()->route('dash.page.index')->with('success', 'page Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();
        return redirect()->route('dash.page.index')->with('success', 'Category page deleted successfully');
    }
    public function forceDestroy($id)
    {
        $page = Page::withTrashed()->find($id);
        $thumbnail = 'public' . $page->toArray()['thumbnail'];
        $banner = 'public' . $page->toArray()['banner'];
        if (Storage::exists($thumbnail) || Storage::exists($banner)) {
            Storage::delete([$thumbnail, $banner]);
        }

        $page->forceDelete();

        return redirect()->route('dash.page.index')->with('success', 'Category page Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Page::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.page.index')->with('success', 'Category page restored successfully');
    }
}
