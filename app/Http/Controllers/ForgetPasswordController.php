<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgetPasswordController extends Controller
{
    //
    use SendsPasswordResetEmails;
}
