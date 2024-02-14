<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LeadCustomer;

class FormLeadsComponent extends Component
{
    public $name, $email, $phone, $diploma, $successMessage = '';

    protected $listeners = ['leadAdded'];

    protected $rules = [
        'name' => 'required',
        'phone' => 'required',
        'diploma' => 'required',
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.form-leads-component');
    }

    public function send()
    {
        $this->validate();
        $leadCustomer = new LeadCustomer();
        $leadCustomer->name             = $this->name;
        $leadCustomer->mobile           = $this->phone;
        $leadCustomer->branch_id        = env('BRANCH_ID');
        $leadCustomer->account_id       = env('ACCOUNT_ID');
        $leadCustomer->lead_source_id   = env('LEAD_SOURCE_ID');
        $leadCustomer->lead_status_id   = env('LEAD_STATUS_ID');
        $leadCustomer->product_id       = intval($this->diploma) ? $this->diploma : 1;
        $leadCustomer->comment          = "(email" . " = " . $this->email . ")";
        $leadCustomer->created_by       = null;
        $leadCustomer->save();
        $this->successMessage = "تم ارسال معلوماتك بنجاح";
    }
}
