<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables,Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Permission::query())
                ->addColumn('name', function (Permission $permissions) {
                    return $permissions->name;
                })
                
                ->addColumn('action', function (Permission $permissions) {
                    return \view('backend.permissions.button_action', compact('permissions'));
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            
            return view('backend.permissions.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        Permission::create($request->only(['name']));
        return back()->with('success', 'Permission Created successfully');
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
        $permissions = Permission::find($id);
        return view('backend.permissions.edit',compact('permissions'));
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
            'name' => 'required',
        ]);
        Permission::find($id)->update($request->only(['name']));
        return back()->with('success', 'Permission Created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('dash.permissions.index')->with('success', 'Permission deleted successfully');
    }
    public function forceDestroy($id)
    {
        Permission::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.permissions.index')->with('success', 'Permission Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Permission::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.permissions.index')->with('success', 'Permission restored successfully');
    }
}
