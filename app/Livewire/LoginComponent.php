<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginComponent extends Component
{
    public $baseUrl;
    public $email, $password, $remember; // login

    public function mount()
    {
        $this->baseUrl = basename(Request::path());
    }

    public function render()
    {
        return view('livewire.login-component');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember = ($this->remember) ? true : false;
        $fieldType = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        if ($this->baseUrl == 'login-student') {
            if (Auth::guard('customers')->attempt([$fieldType => $this->email, 'password' => $this->password], $remember)) {
                return redirect(route('student.dashboard'));
            } else {
                return $this->addError('email', __('messages.wrong credintial'));
            }
        } elseif ($this->baseUrl == 'login-trainers') {
            if (Auth::guard('instructor')->attempt(['email' => $this->email, 'password' => $this->password], $remember)) {
                return redirect(route('instructor.dashboard'));
            } else {
                return $this->addError('email', __('messages.wrong credintial'));
            }
        }
    }
}
