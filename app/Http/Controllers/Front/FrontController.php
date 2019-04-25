<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
// use App\Permission;
// use App\Role;
use Illuminate\Http\Request;
// use Session;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('signin.index');
    }

    /**
     * Display given permissions to role.
     *
     * @return void
     */
    public function getGiveRolePermissions()
    {
        $roles = Role::select('id_role', 'name', 'label')->get();
        $permissions = Permission::select('id_permission', 'name', 'label')->get();

        return view('admin.permissions.role-give-permissions', compact('roles', 'permissions'));
    }

    /**
     * Store given permissions to role.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return void
     */
    public function postGiveRolePermissions(Request $request)
    {
        $this->validate($request, ['role' => 'required', 'permissions' => 'required']);

        $role = Role::with('permissions')->whereName($request->role)->first();
        $role->permissions()->detach();

        foreach ($request->permissions as $permission_name) {
            $permission = Permission::whereName($permission_name)->first();
            $role->givePermissionTo($permission);
        }

        Session::flash('flash_message', 'Permission granted!');

        return redirect('admin/roles');
    }

    public function tentangkami(){

        return view('front_page.tentangkami');
    }

    public function layanan(){

        return view('front_page.layanan');
    }

    public function informasi(){

        return view('front_page.informasi');
    }

    public function faq(){

        return view('front_page.faq');
    }
}
