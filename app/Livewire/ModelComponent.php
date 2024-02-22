<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class ModelComponent extends Component
{
    public function render()
    {
        $setting = Setting::where("model_type", 'App\Models\ProductType')
            ->where("model_id", 6)->first();
        return view('livewire.model-component', ['setting' => $setting]);
    }
}
