<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\StorePermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('permissions.access');
        $permissions = Permission::orderBy('name')->get();
        return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permissions.manage');
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\StorePermission  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission $request)
    {
        $validated = $request->validated();

        $permission = new Permission();
        $permission->name = $validated['permissionName'];
        $permission->guard_name = 'web';
        $permission->save();

        return redirect()->route('admin.permissions.index')->with('status-success', 'Permission ' . $permission->name . ' was added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $this->authorize('permissions.manage');
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\StorePermission  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(StorePermission $request, Permission $permission)
    {
        $validated = $request->validated();

        $permission->name = $validated['permissionName'];
        $permission->save();

        return redirect()->route('admin.permissions.index')->with('status-success', 'Permission ' . $permission->name . ' was modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // Pending. To check if any user has been assigned this permission.
    }
}
