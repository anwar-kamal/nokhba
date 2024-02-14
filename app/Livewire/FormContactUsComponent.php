<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class FormContactUsComponent extends Component
{
    public $name, $phone, $email, $age;

    public function render()
    {
        return view('livewire.form-contact-us-component');
    }

    public function send()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'email|required',
        ]);
        $date = [
            'subject' => "contatct us",
            'logo' => getGlobal('logo')['logo'],
            "name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "age" => $this->age,
        ];
        if (is_array(getGlobal('email')['email'])) {
            foreach (getGlobal('email')['email'] as $email) {
                Mail::to($email)->send(new ContactUsMail($date));
            }
        } else {
            Mail::to(getGlobal('email')['email'])->send(new ContactUsMail($date));
        }
    }
}
