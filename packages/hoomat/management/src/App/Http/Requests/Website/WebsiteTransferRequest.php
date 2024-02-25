<?php

namespace Hoomat\Management\App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteTransferRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'organization_id' => ['required', 'string', 'exists:organizations,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'plan_id.*' => 'پلن وارد شده معتبر نیست',
        ];
    }
}
