<?php

namespace App\Http\Controllers;

use App\Services\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, NewsLetter $newsLetter)
    {
        $request->validate(['email' => 'required|email']);

        try {
            $newsLetter->subscribed($request->input('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['email' => 'Can\'t subscribe this email']);
        }

        return redirect('/')->with(['status' => 'success', 'message' => 'You\'re now a subscriber']);
    }
}