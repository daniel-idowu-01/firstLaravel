<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgetPasswordController extends Controller
{
    //
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }
    
        $token = Password::createToken($user);
        
        Mail::to($user->email)->send(new NewEmail($token, $user->email));
        
        return back()->with('status', 'Password reset link sent to your email');
    }
}
