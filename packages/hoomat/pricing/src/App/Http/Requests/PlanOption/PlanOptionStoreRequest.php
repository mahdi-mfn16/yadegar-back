<?php

namespace Hoomat\Pricing\App\Http\Requests\PlanOption;

use Illuminate\Foundation\Http\FormRequest;

class PlanOptionStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [          
            'title' => ['required', 'string'],               
        ];
    }

    public function messages(): array
    {
        return [
            'title.*' => 'عنوان وارد شده معتبر نیست',
          
        ];
    }
}