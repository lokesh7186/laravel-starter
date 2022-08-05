<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirectUser()
    {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.home');
        }
    }
}
