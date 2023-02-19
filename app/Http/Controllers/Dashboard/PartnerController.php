<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Partner::withTrashed()->query())
                ->addColumn('name', function (Partner $partner) {
                    return $partner->name;
                })
                ->addColumn('url', function (Partner $partner) {
                    return $partner->url;
                })
                ->addColumn('image', function (Partner $partner) {
                    return asset('storage' . $partner->image);
                })
                ->addColumn('action', function (Partner $partner) {
                    return \view('backend.partner.button_action', compact('partner'));
                })
                ->addColumn('status', function (Partner $partner) {
                    if ($partner->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.partner.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partner.create');
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
            'name' => 'required|string',

        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        Partner::create($input);
        return back()->with('success', 'Partner Created successfully');
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
        $partner = Partner::find($id);
        return view('backend.partner.create', compact('partner'));
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
            'name' => 'required|string',
            'description' => 'string',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);

        Partner::find($id)->update($input);
        return back()->with('success', 'Partner Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partner::find($id)->delete();
        return redirect()->route('dash.partner.index')->with('success', 'Partner deleted successfully');
    }
    public function forceDestroy($id)
    {
        Partner::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.partner.index')->with('success', 'Partner Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Partner::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.partner.index')->with('success', 'Partner restored successfully');
    }
}
