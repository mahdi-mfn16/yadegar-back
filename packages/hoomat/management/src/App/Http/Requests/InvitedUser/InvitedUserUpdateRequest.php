<?php

namespace Hoomat\Management\App\Http\Requests\InvitedUser;

use Illuminate\Foundation\Http\FormRequest;

class InvitedUserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'size' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.*' => 'عنوان وارد شده معتبر نیست',
            'size.*' => 'اندازه انتخاب شده معتبر نیست',
        ];
    }
}
