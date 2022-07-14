<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Using Dashboard to Redirect by user type
    Route::get('/dashboard', [HomeController::class, 'redirectUser'])
        ->name('dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // User Home
    Route::get('/user/home', function () {
        return view('user-home');
    })->name('user.home');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
