<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class SignUpComponent extends Component
{
    public $name, $email, $phone, $nationality = 1, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.sign-up-component');
    }

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:customers,mobile',
            'email' => 'required|email|unique:customers,email',
        ]);
        try {
            // Get Last Customer Code
            $last_code  = $this->getLastCustomerCode();
            //Create New Customer
            $user = new Customer();
            $user->ar_f_name = $this->name;
            $user->en_f_name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->code = date('y') . $last_code;
            $user->opened_by = null;
            $user->email_verified_at = null;
            $user->account_source_id = env('ACCOUNT_SOURCE_ID');
            $user->company_id = env('COMPANY_ID');
            $user->password = Hash::make($this->password);
            $user->save();
            auth('customers')->login($user);
            return redirect(route('student.dashboard'));
        } catch (\Exception $ex) {
            Log::info($ex->getMessage());
        }
    }

    public function getLastCustomerCode()
    {
        $c = Customer::where(DB::raw('left(code,2)'), '=', date('y'))->max('code');
        if ($c) {
            $last_customer_code = $c;
            $last_code = substr($last_customer_code, 2 + strlen(env('Company_ID', 1)));
        } else {
            $last_code = 0;
        }

        $last_code++;
        $last_code = env('Company_ID', 1) . $last_code;

        return  $last_code;
    }
}
