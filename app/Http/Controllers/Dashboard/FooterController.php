<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Footer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {
        // dd(Footer::with([
        //     'parent' => function ($query) {
        //         return $query->with('childrent')->withTrashed();
        //     },

        //     'childrent' => function ($query) {
        //         return $query->with('parent')->withTrashed();
        //     },
        // ])->withTrashed()->get());
        if ($request->ajax()) {
            
            return $datatables->of(Footer::with([
                'parent' => function ($query) {
                    return $query->with(['childrent','parent'])->withTrashed();
                },

                'childrent' => function ($query) {
                    return $query->with(['childrent','parent'])->withTrashed();
                },
            ])->withTrashed())
                ->addColumn('name', function (Footer $footer) {
                    // dd($footer);
                    return $footer->name;
                })

                ->addColumn('url', function (Footer $footer) {
                    return $footer->url;
                })
                ->addColumn('parent_id', function (Footer $footer) {
                    return !empty($footer->parent->toArray())  ? $footer->childrent->name : '-';
                    // return dd($);
                })
                ->addColumn('action', function (Footer $footer) {
                    return \view('backend.footer.button_action', compact('footer'));
                })
                ->addColumn('status', function (Footer $footer) {
                    if ($footer->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.footer.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        $footer_list = Footer::pluck('name', 'id')->all();
        // dd($footer);
        return view('backend.footer.create', compact('footer_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        // dd($request->all());
        $input = $request->all();
        $input['url'] = $input['url'] ? $input['url'] : '#';
        $input['parent_id'] = $input['parent_id'][0] != null ? \implode("", $input['parent_id']): null;
        
        Footer::create($input);
        return redirect()->route('dash.footer.index')->withSuccess('Footer Created Successfully');
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
        $footer_list = Footer::with(['parent','childrent'])->find($id);
        return view('backend.footer.create', compact('footer_list'));
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
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        $input['url'] = $input['url'] ? $input['url'] : '#';

        $input['parent_id'] = $input['parent_id'][0] != null ? \implode("", $input['parent_id']): null;
        Footer::find($id)->update($input);
        return back()->with('success', 'footer Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Footer::find($id)->delete();
        return redirect()->route('dash.footer.index')->with('success', 'tag Post deleted successfully');
    }
    public function forceDestroy($id)
    {
        Footer::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.footer.index')->with('success', 'Category Post Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Footer::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.footer.index')->with('success', 'tag Post restored successfully');
    }
}
