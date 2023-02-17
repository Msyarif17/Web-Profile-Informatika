<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Role::query())
                ->addColumn('name', function (Role $roles) {
                    return $roles->name;
                })
                ->addColumn('permission', function (Role $roles) {
                    return implode(", ",$roles->permissions()->pluck('name')->toArray());
                })
                ->addColumn('action', function (Role $roles) {
                    return \view('backend.roles.button_action', compact('roles'));
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.roles.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id')->all();
        return view('backend.roles.create', compact('permissions'));
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
            'name' => 'required',
        ]);
        $roles = Role::create($request->only(['name']));
        if ($request->permission_id)
            foreach ($request->permission_id as $p) {
                // dd($p);
                $roles->givePermissionTo($p);
            }
        return back()->with('success', 'Roles Created successfully');
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
        $roles = Role::find($id);
        $permissions = Permission::pluck('name', 'name')->all();
        return view('backend.roles.edit', compact('roles', 'permissions'));
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

        $roles = Role::find($id);
        $roles->revokePermissionTo($roles->permissions()->pluck('name')->toArray());
        if ($request->permission_id)
            foreach ($request->permission_id as $p) {
                
                $roles->givePermissionTo($p);
                
            }
        $roles->update($request->only(['name']));
        return back()->with('success', 'Roles Created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('dash.roles.index')->with('success', 'Roles deleted successfully');
    }
    public function forceDestroy($id)
    {
        Role::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.roles.index')->with('success', 'Roles Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Role::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.roles.index')->with('success', 'Roles restored successfully');
    }
}
