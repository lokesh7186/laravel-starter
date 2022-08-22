<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
    public function index()
    {
        $this->authorize('user_permissions.manage');

        return view('admin.user.assign_permissions', ['username' => '']);
    }

    public function search(Request $request, $username)
    {
        $this->authorize('user_permissions.manage');

        $user = User::with('permissions')->where('username', $request->username)->first();
        if (!$user) {
            return redirect()->route('admin.user_permissions.index')->with('status-error', 'User ' . $request->username . ' not found.');
        }

        $viewData = [];
        $viewData['username'] = $request->username;
        $viewData['user'] = $user;
        $viewData['userPermissions'] = $user->permissions;

        $viewData['allPermissions'] = Permission::all();
        return view('admin.user.assign_permissions', $viewData);
    }

    public function store(Request $request, $username)
    {
        $this->authorize('user_permissions.manage');

        $user = User::where('username', $request->username)->firstOrFail();
        $request->validate([
            'user_permissions.*.name' => 'sometimes|exists:permissions,name'
        ]);
        $user->syncPermissions($request->user_permissions);
        return redirect()->route('admin.user_permissions.search', ['username' => $username])->with('status-success', 'Permissions saved for User ' . $username);
    }
}
