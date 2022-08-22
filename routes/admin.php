<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserPermissionController;

// Route::get('admin', [DashboardController::class, 'index'])->name('admin_dashboard');

Route::group([
    'middleware' => 'is_admin',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/', [HomeController::class, 'redirectUser'])->name('index');
});

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->middleware(['is_admin'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Roles and permission will be added and assigned using Tinker for now.
        // Route::resource('roles', 'RoleController');
        // Route::resource('permissions', 'PermissionController');

        Route::match(['put', 'patch'], 'users/{user}/toggle', [UserController::class, 'toggleActive'])->name('users.toggle_status');
        Route::resource('users', 'UserController');

        Route::controller(UserPermissionController::class)->group(function () {
            Route::get('user_permissions', 'index')->name('user_permissions.index');
            Route::get('user_permissions/{username}', 'search')->name('user_permissions.search');
            Route::put('user_permissions/{username}', 'store')->name('user_permissions.store');
        });

        Route::resource('permissions', 'PermissionController');

        Route::resource('settings', 'AppSettingsController');

        // Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        // Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
        // Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        // Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
    });
