<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $incomingData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $incomingData['password'] = bcrypt($incomingData['password']);
        $user = User::create($incomingData);
        auth()->login($user);
        
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
