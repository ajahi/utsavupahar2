<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::paginate(15),
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ];
        return view('cms.users.index', $data);
    }

    public function assignRole(Request $request, User $user)
    {
        $user->syncRoles($request->roles);
        return redirect()->back()->with('success', 'Roles updated for ' . $user->name);
    }

    public function assignPermission(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Permissions updated for ' . $user->name);
    }
}
