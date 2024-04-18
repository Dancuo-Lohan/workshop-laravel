<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->role->name === 'admin')
                return redirect()->intended('/administrator');

            if (auth()->user()->role->name === 'project-manager')
                return redirect()->intended('/project-manager');

            if (auth()->user()->role->name === 'developer')
                return redirect()->intended('/developer');

            return redirect()->intended('/');
        }

        return view('login');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role->name === 'admin')
                return redirect()->intended('/administrator');

            if (auth()->user()->role->name === 'project-manager')
                return redirect()->intended('/project-manager');

            if (auth()->user()->role->name === 'developer')
                return redirect()->intended('/developer');

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
