<?php

namespace Hoomat\Management\App\Http\Requests\Industry;

use Illuminate\Foundation\Http\FormRequest;

class IndustryIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => ['sometimes', 'nullable', 'int', 'min:5'],
            'filters.search' => ['sometimes', 'nullable', 'string']
        ];
    }


    public function messages(): array
    {
        return [
            'limit.*' => 'وضعیت ارسالی نامعتبر است',
            'filters.search.*' => 'مقدار فیلتر جستجو نامعتبر است',
            
        ];
    }
}
