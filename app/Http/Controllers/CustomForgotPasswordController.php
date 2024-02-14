<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class CustomForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required']);
        if ($request['currentUrl'] == "student") {
            $user = Customer::where('email', $request->email)->first();
        } elseif ($request['currentUrl'] == "trainers") {
            $user = User::where('email', $request->email)->first();
        }

        if (!$user) {
            return back()->withErrors(['error' => __("messages.We could not find a user with this email address.")]);
        }

        $token = Str::random(60);
        $user->reset_token = $token;
        $user->reset_token_expiry = now()->addMinutes(60);
        $user->save();
        $currentUrl = $request['currentUrl'];
        $resetLink = URL::to("/reset-password?token=$token&email=$user->email&currentUrl=$currentUrl");

        Mail::to($user->email)->send(new ResetPasswordMail($resetLink));

        return back()->withErrors(['success' => __("messages.A link to set a new password has been sent to your email")]);
    }
}
