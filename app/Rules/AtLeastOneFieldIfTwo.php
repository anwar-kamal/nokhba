<?php

namespace App\Rules;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AtLeastOneFieldIfTwo implements Rule
{
    public function passes($attribute, $value)
    {
        // Log::info(is_object($value));
        // $replicatorCount = isset($value) ? count($value) : null;
        // if ($replicatorCount) {
        //     if ($replicatorCount === 2 && $value[0]['field'] === null && $value[1]['field'] === null) {
        //         return false;
        //     }
        // }

        // Otherwise, the rule passes
        return true;
    }

    public function message()
    {
        return 'At least one field is required if there are two items in the replicator.';
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'replicator_field' => ['required', new AtLeastOneFieldIfTwo],
        ]);

        if ($validator->fails()) {
            return redirect('your_form_route')
                ->withErrors($validator)
                ->withInput();
        }

        // Process the form data if validation passes

        return redirect('success_route');
    }
}
