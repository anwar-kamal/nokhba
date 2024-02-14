<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomResetPasswordController extends Controller
{
    
    public function showResetForm(Request $request)
    {
        return view('auth.reset-password', ['token' => $request['token'], 'email' => $request['email']]);
    }

    public function resetPassword(Request $request)
    {
        dd(123);
        $request->validate([
            'token' => 'required',
            'currentUrl' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($request['currentUrl'] == "trainers") {
            $user = User::where('email', $request->email)
                ->where('reset_token', $request->token)
                ->where('reset_token_expiry', '>', now())
                ->first();
        } elseif ($request['currentUrl'] == "student") {
            $user = Customer::where('email', $request->email)
                ->where('reset_token', $request->token)
                ->where('reset_token_expiry', '>', now())
                ->first();
        }

        if (!$user) {
            return redirect()->back()->withErrors(['error' => __('messages.Invalid token or expired link.')]);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'reset_token' => null,
            'reset_token_expiry' => null,
        ]);

        if ($request['currentUrl'] == "trainers") {
            // return redirect(route('instructor.dashboard'));
            return redirect()->back();
        } elseif ($request['currentUrl'] == "student") {
            return redirect(route('student.dashboard'));
        }
        // return redirect('/')->withErrors(['status' => __('messages.The password has been reset successfully. Log in with your new password.')]);
    }
}
