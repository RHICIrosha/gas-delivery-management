<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            switch ($user->user_type) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'outlet_manager':
                    return redirect()->route('outlet.dashboard');
                case 'customer':
                    return redirect()->route('customer.dashboard');
                case 'businesscustomer':
                    return redirect()->route('business.dashboard');
                default:
                    return redirect()->intended('/dashboard');
            }
        }


        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.'])->onlyInput('email');
        }

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['password' => 'Incorrect password. Please try again.'])->onlyInput('password');
        }

        $request->session()->regenerate();
        return redirect()->intended('/login'); // Redirect after successful login
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    // public function logout(Request $request)
    // {
    //     // Log out the user
    //     Auth::logout();

    //     // Invalidate the session to prevent session fixation attacks
    //     $request->session()->invalidate();

    //     // Regenerate the session token to prevent CSRF attacks
    //     $request->session()->regenerateToken();

    //     // Redirect the user to the login page after logging out
    //     return redirect('/login');
    }
