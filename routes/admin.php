<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

// Route::get('admin', [DashboardController::class, 'index'])->name('admin_dashboard');

Route::group([
    'middleware' => 'role:admin',
    'prefix' => 'administrator',
    'as' => 'admin.',
], function () {
    Route::get('/', [HomeController::class, 'redirectUser'])->name('index');
});


Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('administrator')->middleware(['role:admin'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('users', 'UserController');
        Route::match(['put', 'patch'], 'users/{user}/toggle', [UserController::class, 'toggleActive'])->name('users.toggle_status');

        // Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        // Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
        // Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        // Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
    });
