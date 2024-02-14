<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class RegistrationFormComponent extends Component
{
    public $name, $email, $phone, $diploma, $image_diploma, $title_diploma, $title_diploma_ar;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        if (auth('customers')->user()) {
            $customers = auth('customers')->user();
            $this->name = $customers->name;
            $this->email = $customers->email;
            $this->phone = $customers->phone;
        }
    }

    public function render()
    {
        return view('livewire.registration-form-component');
    }

    public function subscribe()
    {
        if (is_array($this->diploma) && array_key_exists('value', $this->diploma)) {
            Session::put('subscribeDiploma', $this->diploma['value']);
        }
        Session::put('imageDiploma', $this->image_diploma);
        Session::put('titleDiploma', $this->title_diploma);
        Session::put('titleDiploma_ar', $this->title_diploma_ar);

        if (App::getLocale() == 'ar') {
            return redirect('/select-plan');
        } else {
            return redirect('/en/select-plan');
        }
    }

    public function send()
    {
        $this->validate();
        // $leadCustomer = new LeadCustomer();
        // $leadCustomer->name             = $this->name;
        // $leadCustomer->mobile           = $this->phone;
        // $leadCustomer->branch_id        = env('BRANCH_ID');
        // $leadCustomer->account_id       = env('ACCOUNT_ID');
        // $leadCustomer->lead_source_id   = env('LEAD_SOURCE_ID');
        // $leadCustomer->lead_status_id   = env('LEAD_STATUS_ID');
        // // $leadCustomer->product_id       = $this->want_to_learn == "بث مباشر" ? 6 : 1;
        // $leadCustomer->comment          = "(email" . " = " . $this->email . ")";
        // $leadCustomer->created_by       = null;
        // // Sheets::spreadsheet('1Sf4lMKRRzTSLSxTjk_9uIrA5floMgqBfLm8VK3OR9iw')
        // //     ->sheet('ORO')->append([[
        // //         'name' => $leadCustomer->name,
        // //         'email' => $leadCustomer->email ?? "",
        // //         "phone" => $leadCustomer->mobile,
        // //         'age' => $this->age ?? "",
        // //         "course name" => Product::find($leadCustomer->product_id)->name . "*" . $leadCustomer->product_id,
        // //         "branch" => Branch::find($leadCustomer->branch_id)->en_name . "*" . $leadCustomer->branch_id,
        // //         "city" => $leadCustomer->city,
        // //         "google id" => $leadCustomer->google_id,
        // //         "comment" => $leadCustomer->comment,
        // //         "date" => Carbon::now()->format('j F Y h:i:s A')
        // //     ]]);
        // $leadCustomer->save();
        // dD($leadCustomer);
    }
}
