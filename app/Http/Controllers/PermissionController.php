<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('cms.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.permissions.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles,name',
            'roles' => 'nullable|array',
        ]);
        $permission = Permission::create($validator->validated());
        if (array_key_exists('roles', $validator->validated())) {
            $permission->syncRoles($validator->validated()['roles']);
        }
        return redirect()->route('permissions.index')->with('success', "Permission Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findById($id);
        $assigned_roles  = $permission->roles()->get();
        $unassigned_roles = Role::all()->diff($assigned_roles);
        return view('cms.permissions.edit', [
            'permission' => $permission,
            'assigned_roles' => $assigned_roles,
            'unassigned_roles' => $unassigned_roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findById($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('roles')->ignore($permission->id)]
        ]);
        $data = $validator->validated();
        $permission->update($data);
        return redirect()->back()->with('success', 'Permission name updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::destroy($id);
        return redirect()->back()->with('warning', 'Permission Deleted');
    }

    public function change(Request $request, string $permission)
    {
        $permission = Permission::findByName($permission);
        $permission->syncRoles($request->roles);
        return redirect()->back()->with('success', 'Roles updated in permission');
    }
}
