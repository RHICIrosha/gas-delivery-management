<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|unique:users',
            'nic' => 'required|string|unique:users',
            'address' => 'required|string',
            'user_type' => 'required|in:customer,outlet_manager,admin,business',
           'password' => 'required|string|min:8|confirmed',  // Ensure password confirmation
        ]);
        // Debug: Log registration data
        Log::info('Registration data: ', $request->all());

        // Create a new user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nic' => $request->nic,
            'address' => $request->address,
            'user_type' => $request->user_type,
            'password' => bcrypt($request->password),
        ]);
        // Debug: Log hashed password correctly
        Log::info('Hashed Password: ' . $user->password);

        Auth::login($user);

        switch ($user->user_type) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'outlet_manager':
                return redirect()->route('outlet.dashboard');
            case 'customer':
                return redirect()->route('customer.dashboard');
            case 'business':
                return redirect()->route('business.dashboard');
            default:
                return redirect('/dashboard');
        }
    }
}
