<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add Super Admin User
        $super_admin_user = User::create([
            'username' => 'admin',
            'is_admin' => 1,
            'firstname' => 'Lokesh',
            'lastname' => 'Tulsani',
            'email' => 'lokesh7186@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // Add Admin User
        $admin_user = User::create([
            'username' => 'admin2',
            'is_admin' => 1,
            'firstname' => 'Admin',
            'lastname' => 'Staff',
            'email' => 'admin@mysite.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // Add Admin Role and assign to admin user
        $super_admin_role = Role::create(['name' => 'Super Admin']);
        $super_admin_user->assignRole($super_admin_role);

        // Create Permissions
        Permission::create(['name' => 'app_settings.access']);
        Permission::create(['name' => 'app_settings.manage']);

        Permission::create(['name' => 'roles.access']);
        Permission::create(['name' => 'roles.manage']);

        Permission::create(['name' => 'permissions.access']);
        Permission::create(['name' => 'permissions.manage']);

        Permission::create(['name' => 'users.access']);
        Permission::create(['name' => 'users.manage']);

        Permission::create(['name' => 'user_permissions.manage']);

        // Give all permissions to super admin.
        $super_admin_user->givePermissionTo(Permission::all());

        // Create a normal Admin role and assign some permission to the user of this Role
        $admin_role = Role::create(['name' => 'Admin']);
        $admin_user->assignRole($admin_role);
        $admin_user->givePermissionTo(['users.manage']);
        $admin_user->givePermissionTo(['app_settings.access']);

        // Create a read only admin user.
        $readonly_user = User::create([
            'username' => 'readonly',
            'is_admin' => 1,
            'firstname' => 'Lower',
            'lastname' => 'Staff',
            'email' => 'lokesht.brd@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $readonly_admin_role = Role::create(['name' => 'Read Only']);
        $readonly_user->assignRole($readonly_admin_role);
        $readonly_user->givePermissionTo(['users.access']);

        // Add Dummy Site Users for Frontend. These Users will have no Role, Permissions
        $site_users = User::factory(100)->create();

        // Create Site users Dummy Profiles.
        $profiles = UserProfile::factory(10)->make()->each(function ($profile, $index)  use ($site_users) {
            $profile->user_id = $site_users[$index]->id;
            $profile->profile_slug = Str::slug($site_users[$index]->name);
            $profile->save();
        });
    }
}
