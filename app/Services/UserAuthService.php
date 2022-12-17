<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthService
{
    public function auth($loginOrEmail, $password): bool
    {
        $user = User::query()
                ->where('username', $loginOrEmail)
                ->orWhere('email', $loginOrEmail)
                ->first();

        if ($user && Auth::attempt(['email' => $user->email, 'password' =>  $password]))
        {
            Auth::login($user);

            return true;
        }

        return false;
    }
}
