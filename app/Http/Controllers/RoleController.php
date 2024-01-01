<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('cms.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.roles.create', ['permissions' => Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);
        $role = Role::create($validator->validated());
        if (array_key_exists('permissions', $validator->validated())) {
            $role->syncPermissions($validator->validated()['permissions']);
        }
        return redirect()->route('roles.index')->with('success', 'Role Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findById($id);
        $assigned_permissions  = $role->permissions()->get();
        $unassigned_permissions = Permission::all()->diff($assigned_permissions);
        return view('cms.roles.edit', [
            'role' => $role,
            'assigned_permissions' => $assigned_permissions,
            'unassigned_permissions' => $unassigned_permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findById($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('roles')->ignore($role->id)]
        ]);
        $data = $validator->validated();
        $role->update($data);
        return redirect()->back()->with('success', 'Role name changed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()->back()->with('warning', 'Role Deleted');
    }

    public function change(Request $request, string $role)
    {
        $role = Role::findByName($role);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Permissions updated in role');
    }
}
