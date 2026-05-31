<?php

namespace Yadegar\Memory\App\Http\Requests\Folder;

use Illuminate\Foundation\Http\FormRequest;

class FolderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:50'],
            'description' => ['sometimes', 'nullable', 'string'],
            
        ];
    }
}