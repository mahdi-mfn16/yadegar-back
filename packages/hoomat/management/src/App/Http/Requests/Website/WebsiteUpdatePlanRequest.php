<?php

namespace Hoomat\Management\App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteUpdatePlanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'plan_id' => ['required', 'string', 'exists:plans,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'plan_id.*' => 'پلن وارد شده معتبر نیست',
        ];
    }
}
