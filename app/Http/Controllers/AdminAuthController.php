<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Displaying admin login page
    public function showLogin()
    {
        return view('admin.login');
    }

    // Handling admin login
    public function login(Request $request)
    {
        // Validating inputs
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Looking up the admin account by its username
        $admin = Admin::where('username', $request->username)->first();

        // Ensuring that the admin exists and the password matches the stored hash value in its respective DB table
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors([
                'login' => 'Invalid credentials',
            ]);
        }

        // Storing the adminID in the session to store authentication
        session(['admin_id' => $admin->id]);

        return redirect()->route('home');
    }

    // Logging out the admin by removing the adminID from said session
    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('home');
    }
}
