<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        User::create(
            $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|min:4|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6|max:255'
            ])
        );

        return redirect('/');
    }
}
