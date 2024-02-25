<?php

namespace Hoomat\Management\App\Http\Requests\InvitedUser;

use Illuminate\Foundation\Http\FormRequest;

class InvitedUserIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => ['sometimes', 'nullable', 'int', 'min:5'],
            'filters.organization' => ['sometimes', 'nullable', 'int', 'exists:organizations,id'],
            'filters.search' => ['sometimes', 'nullable', 'string']
        ];
    }


    public function messages(): array
    {
        return [
            'limit.*' => 'وضعیت ارسالی نامعتبر است',
            'filters.organization.*' => 'مقدار فیلتر سازمان نامعتبر است',
            'filters.search.*' => 'مقدار فیلتر جستجو نامعتبر است',
            
        ];
    }
}
