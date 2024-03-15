<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function create()
    {
        return view('login.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with(['status' => 'success', 'message' => 'Goodbye']);
    }
}