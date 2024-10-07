<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    public function authenticate($cred)
    {
        // Attempt to log the user in
        if (Auth::attempt($cred)) {
            return true;
        } else {
            // If login fails, return to login page with error message
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
