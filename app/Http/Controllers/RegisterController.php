<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        request()->validate([
            'name' => ['required', 'string', 'min:3', 'max:225'],
            'username' => ['required', 'string', 'min:3', 'max:225', 'unique:users,username'],
            'email' => ['required', 'string', 'max:225', 'unique:users,email'],
            'password' => ['required', 'string', 'min:7', 'max:225'],
        ]);

        $user = User::create(request()->all());

        auth()->login($user);

        return redirect('/')->with('success', 'The user has been created successfully');
    }
}
