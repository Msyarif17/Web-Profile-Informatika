<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {

        if ($request->ajax()) {
            return $datatables->of(User::query())
                ->addColumn('name', function (User $users) {
                    return $users->name;
                })
                ->addColumn('role', function (User $users) {
                    return implode(", ", $users->getRoleNames() ? $users->getRoleNames()->toArray() : []);
                })
                ->addColumn('permission', function (User $users) {
                    return implode(", ", $users->getPermissionNames() ? $users->getPermissionNames()->toArray() : []);
                })
                ->addColumn('status', function (User $user) {
                    if ($user->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->addColumn('action', function (User $users) {
                    $role = implode(", ", $users->getRoleNames() ? $users->getRoleNames()->toArray() : []);
                    if($role == 'Super Admin'){
                        return '-';
                    }
                    else{
                        return \view('backend.users.button_action', compact('users'));

                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.users.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('backend.users.create', compact('roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('dash.users.index')
            ->with('success', 'User created successfully');
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
        $users = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $users->roles->pluck('name', 'name')->all();

        return view('backend.users.edit', compact('users', 'roles', 'userRole'));
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
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $user = User::find($id);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = $user->first()->password;
        }


        $user->update($input);
        if ($request->roles) {

            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($request->roles);
        }

        return redirect()->route('dash.users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('dash.users.index')
            ->with('success', 'User deleted successfully');
    }
}
