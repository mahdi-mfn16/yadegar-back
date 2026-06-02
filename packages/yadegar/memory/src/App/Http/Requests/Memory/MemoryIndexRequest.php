<?php

namespace Yadegar\Memory\App\Http\Requests\Memory;

use Illuminate\Foundation\Http\FormRequest;

class MemoryIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filters' => ['sometimes', 'nullable', 'array'],
            'filters.visibility' => ['sometimes', 'nullable', 'array'],
            'filters.visibility.*' => ['sometimes', 'nullable', 'string', 'in:private,family,public,anonymous'],
            'page' => ['sometimes', 'nullable'],
            'limit' => ['sometimes', 'nullable']
        ];
    }
}