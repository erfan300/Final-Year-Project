<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors([
                'login' => 'Invalid credentials',
            ]);
        }

        session(['admin_id' => $admin->id]);

        return redirect()->route('home');
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('home');
    }
}
