<?php

namespace Hoomat\Pricing\App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class PlanUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'monthly_price' => ['required', 'numeric'],
            'annual_price' => ['required', 'numeric'],
            'options' => ['required', 'array'],
            'options.*' => ['required', 'int','exists:plan_options,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.*' => 'عنوان وارد شده معتبر نیست',
            'name.*' => 'نام انتخاب شده معتبر نیست',
            'monthly_price.*' => 'قیمت انتخاب شده معتبر نیست',
            'annual_price.*' => 'قیمت انتخاب شده معتبر نیست',
            'options.*' => 'ویژگی وارد شده معتبر نیست',   
        ];
    }
}