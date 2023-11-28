<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(!auth()->attempt(['email' => $attributes['email'], 'password' => $attributes['password']]) &&
            !auth()->attempt(['username' => $attributes['email'], 'password' => $attributes['password']])) {
            
            throw ValidationException::withMessages(['email' => 'Your provided credentials are invalid']);

            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'Your provided credentials are invalid']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
