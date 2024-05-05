<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function get_admin_login()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|max:50',
        ]);

        if (auth()->guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with([
                'error' => 'the username or password is not correct'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('get.admin.login');
    }
}
