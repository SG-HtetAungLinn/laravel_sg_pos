<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }
    public function registerPage()
    {
        return view('auth.register');
    }

    public function checkRole()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return to_route('admin.dashboard');
            } elseif (Auth::user()->role === 'user') {
                return to_route('user.home');
            } else {
                self::privateLogout();
            }
        } else {
            return to_route('auth.loginPage');
        }
    }

    public function logout()
    {
        self::privateLogout();
        return to_route('auth.loginPage');
    }

    private static function privateLogout()
    {
        Auth::guard('web')->logout();
    }
}
