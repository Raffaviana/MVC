<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class rolecontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete',
                            ['only' => ['index', 'show']]);
        $this->middleware('permission:role-create',
                            ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit',
                            ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete',
                            ['only' => ['destroy']]);
    }
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);

        return view('roles.index', compact('roles'))->with('i', ($request->input('page', 1)- 1) * 5);
    }


    public function create()
    {
        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'requerid|unique:roles,name',
                                    'permission' => 'required']);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('sucess', 'perfil criado com sucesso');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')->where('role_has_permissions.role_id', $id)->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();

        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)->pluck('role_has_permissions.permission_id')->all();

        return view('roles.edit', compact('roles', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required',
                                    'permission' => 'required']);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'Perfil atualizado');

    }

    public function destroy()
    {
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('roles.index')->with('success', 'Perfil apagado');
    }
}
