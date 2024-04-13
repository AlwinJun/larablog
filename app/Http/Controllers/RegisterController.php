<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(StoreRegisterRequest $request)
    {
        $user = User::create(
            $request->validated()
        );

        // Login after account registration
        auth()->login($user);

        return redirect()->route('home')->with([
            'status' => 'success',
            'message' => 'Your account has been created!'
        ]);
    }
}