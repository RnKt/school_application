<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->remember ? true : false;
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect(route('admin.home'));
        }
        return back()->withErrors(['email' => trans('errors.auth.account.not_found')]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
