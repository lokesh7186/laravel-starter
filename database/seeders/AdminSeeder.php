<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\User;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Add Admin User
        $admin_user = User::create([
            'username' => 'admin',
            'firstname' => 'Lokesh',
            'lastname' => 'Tulsani',
            'email' => 'lokesh7186@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // Add Admin Role and assign to admin user
        $admin_role = Role::create(['name' => 'admin']);
        $admin_user->assignRole($admin_role);

        // Create Permissions
        $permission = Permission::create(['name' => 'Application Settings']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $admin_role->givePermissionTo(Permission::all());

        // Assign all permissions to Admin.
        $admin_user->givePermissionTo(Permission::all());

        // Add Dummy Site Users
        $user_role = Role::create(['name' => 'user']);
        $site_users = User::factory(10)->create();

        // Assign User Role to Frontend users.
        $site_users->each(function ($user, $key) use ($user_role) {
            $user->assignRole($user_role);
        });
    }
}
