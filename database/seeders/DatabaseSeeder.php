<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


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

        // Add Dummy Site Users
        $user_role = Role::create(['name' => 'user']);
        $site_users = User::factory(10)->create();

        $site_users->each(function ($user, $key) use ($user_role) {
            $user->assignRole($user_role);
        });
    }
}
