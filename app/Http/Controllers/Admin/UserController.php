<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;
use App\Http\Requests\Admin\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users.access|users.manage', ['only' => ['index', 'show']]);
        $this->middleware('permission:users.manage', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('roles')->latest()->get();
        return view('admin.user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $validated = $request->validated();

        $user = new User();

        $user->username = $validated['username'];
        $user->firstname = $validated['firstname'];
        $user->lastname = $validated['lastname'];
        $user->email = $validated['email'];
        $user->email_verified_at = now();
        $user->password = Hash::make($validated['password']);
        $user->save();

        $user->assignRole($validated['role']);

        // return redirect()->route('admin.users.show', ['user' => $user->id]);
        return redirect()->route('admin.users.index')->with('status-success', 'User was added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', ['roles' => $roles, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $validated = $request->validated();


        $user->username = $validated['username'];
        $user->firstname = $validated['firstname'];
        $user->lastname = $validated['lastname'];
        $user->email = $validated['email'];
        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        $userCurrentRole = $user->getRoleNames()->first();

        if ($validated['role'] != $userCurrentRole) {
            // Remove the current role
            $user->removeRole($userCurrentRole);
            // Assign new role
            $user->assignRole($validated['role']);
        }

        return redirect()->route('admin.users.index')->with('status-success', 'User ' . $user->username . ' was modified successfully.');
    }

    /**
     * Toggle User Active Status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(Request $request, User $user)
    {
        $this->validate($request, ['isActive' => 'required|boolean']);
        $user->active = $request->isActive;
        $user->save();

        return response()->json([
            'success' => 'Status Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return redirect()->route('admin.users.index')->with('status-warning', 'You Can not delete your own account.');
        }
        $user->delete();

        return redirect()->route('admin.users.index')->with('status-error', 'User ' . $user->username . ' was deleted successfully.');
    }
}
