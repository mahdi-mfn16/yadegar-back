<?php

namespace Yadegar\Identities\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'username' => ['required', 'string', 'max:30'],
            // 'mobile' => ['sometimes', 'nullable', 'string', 'min:11', 'max:11'],
            // 'email' => ['sometimes', 'nullable', 'string', 'email'],
            'gender' => ['sometimes',  'nullable', 'boolean'],
            'birth_date' => ['sometimes',  'nullable', 'date_format:Y-m-d'],
            'avatar' => ['sometimes', 'nullable', 'mimes:jpg,png', 'max:512']
        ];
    }

    public function messages(): array
    {
        return [
            'mobile.*' => 'شماره تلفن وارد شده معتبر نیست',
            'email.*' => 'ایمیل وارد شده معتبر نیست',
            'name.*' => 'نام باید بین 3 تا 30 کاراکتر باشد',
            'username.*' => 'نام خانوادگی باید کمتر از 50 کاراکتر باشد',
            'gender.*' => 'جنسیت وارد شده معتبر نیست',
            'birth_date.*' => 'تاریخ تولد وارد شده معتبر نیست',
            'avatar.*' => 'آواتار باید در فرمت jpg یا png و حداکثر 512 کیلوبایت باشد',
        ];
    }
}
