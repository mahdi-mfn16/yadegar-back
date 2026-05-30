<?php

namespace Yadegar\Identities\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthCheckCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mobile' => ['sometimes', 'nullable', 'string', 'min:11', 'max:11'],
            'code' => ['required', 'string', 'min:6', 'max:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'mobile.*' => 'شماره تلفن وارد شده معتبر نیست',
            'code.*' => 'کد وارد شده معتبر نیست',
        ];
    }
}
