<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validasi login
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Aktifkan Remember Me
        $remember = $request->boolean('remember');

        if (!Auth::attempt(
            $request->only('email', 'password'),
            $remember
        )) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        // Regenerate session setelah login
        $request->session()->regenerate();

        // Log login activity
        ActivityLogService::log(
            'login',
            'User logged in: ' . Auth::user()->name .
            ($remember ? ' (remembered)' : '')
        );

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request)
    {
        // Log logout activity
        if (Auth::check()) {
            ActivityLogService::log('logout', "User logged out: " . Auth::user()->name);
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
