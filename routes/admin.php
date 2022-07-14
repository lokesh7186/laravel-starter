<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'role:admin',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
});
