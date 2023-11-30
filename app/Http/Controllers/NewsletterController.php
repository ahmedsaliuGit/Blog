<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {
        request()->validate(['email' => ['required', 'email']]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'We cannot add this email address to our subscription list.',
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter.');
    }
}
