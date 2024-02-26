<?php

namespace Hoomat\Management\App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'domain' => ['required', 'string'],
            'organization_id' => ['required', 'string', 'exists:organizations,id'],
            'industry_id' => ['required', 'string', 'exists:industries,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.*' => 'عنوان وارد شده معتبر نیست',
            'domain.*' => 'دامنه انتخاب شده معتبر نیست',
            'organization_id.*' => 'سازمان انتخاب شده معتبر نیست',
        ];
    }
}
