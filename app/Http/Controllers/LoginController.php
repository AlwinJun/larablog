<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($credentials)) {

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ])->withInput(['email']);
        }

        // Prevent session fixation attacks
        $request->session()->regenerate();

        return redirect()->route('home')->with(['status' => 'success', 'message' => 'Welcome Back']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home')->with(['status' => 'success', 'message' => 'Goodbye']);
    }
}