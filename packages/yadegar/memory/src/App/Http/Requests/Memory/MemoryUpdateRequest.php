<?php

namespace Yadegar\Memory\App\Http\Requests\Memory;

use Illuminate\Foundation\Http\FormRequest;

class MemoryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visibility' => ['sometimes', 'nullable', 'string', 'in:private,family,public,anonymous'],
            'title' => ['sometimes', 'nullable', 'string'],
            'location' => ['sometimes', 'nullable', 'string'],
            'folder_id' => ['sometimes', 'nullable', 'numeric', 'exists:folders,id'],
            'date' => ['sometimes', 'nullable', 'date_format:Y-m-d'],
            'text' => ['sometimes', 'nullable', 'string'],
            'photo' => ['sometimes', 'nullable', 'mimes:jpg,png,jpeg', 'max:1024'],
            'audio' => ['sometimes', 'nullable', 'mimes:mp3,m4a,wav,ogg', 'max:16384'],
            'video' => ['sometimes', 'nullable', 'mimes:mp4,mkv,avi', 'max:32768'],
        ];
    }
}