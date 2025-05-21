<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginpage()
    {
        return view('login.login');
    }

    public function registerpage()
    {
        return view('login.register');
    }

    public function registersave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,agency_staff,user',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user.login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
            'role' => 'required|in:admin,agency_staff,user',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect based on role
            switch ($user->role) {
                case 'admin':
                    //return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
                case 'agency_staff':
                    //return redirect()->route('agency.dashboard')->with('success', 'Welcome Agency Staff!');
                case 'user':
                    return redirect()->route('home')->with('success', 'Welcome User!');
                default:
                    Auth::logout();
                    return redirect()->route('user.login')->with('error', 'Unknown role!');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
