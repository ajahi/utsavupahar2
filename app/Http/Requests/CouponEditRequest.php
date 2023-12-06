<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|unique:coupons,code,'.$this->coupon->id,
            'title' => 'nullable|string',
            'discount_type' => 'required|string',
            'discount_value' => 'required|numeric',
            'min_order_amount' => 'required|numeric',
            'max_uses' => 'required|integer',
            'start_date' => 'nullable|date|after:today',
            'end_date' => 'nullable|date|after:today',
            'is_active' => 'nullable|in:on',
        ];
    }
}
