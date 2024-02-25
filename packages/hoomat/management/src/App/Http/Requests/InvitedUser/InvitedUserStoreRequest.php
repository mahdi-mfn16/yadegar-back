<?php

namespace Hoomat\Management\App\Http\Requests\InvitedUser;

use Illuminate\Foundation\Http\FormRequest;

class InvitedUserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'access_level_id' => ['required', 'int', 'exists:access_levels,id'],
            'organization_id' => ['required', 'int', 'exists:organizations,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.*' => 'hایمیل وارد شده معتبر نیست',
            'access_level_id.*' => 'سطح دسترسی انتخاب شده معتبر نیست',
            'organization_id.*' => 'سازمان انتخاب شده معتبر نیست',
        ];
    }
}
