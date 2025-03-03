<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        try {
            $validated = $registerRequest->validated();

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Registration successful and logged in!');
        } catch (Exception $e) {
            Log::error("Register Failed", ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Register Failed');
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        try {
            $validated = $loginRequest->validated();

            if (Auth::attempt([
                'email' => $validated['email'],
                'password' => $validated['password']
            ])) {
                return redirect()->intended('/dashboard')->with('sucess', 'Login successful');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials, please try again.');
            }
        } catch (Exception $e) {
            Log::error("Register Failed", ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'An error occurred during login. Please try again later.');
        }
    }
}
