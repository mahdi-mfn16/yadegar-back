<?php

namespace Yadegar\Identities\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mobile' => ['sometimes', 'nullable', 'string', 'min:11', 'max:11'],
        ];
    }

    public function messages(): array
    {
        return [
            'mobile.*' => 'شماره تلفن وارد شده معتبر نیست',
        ];
    }
}
