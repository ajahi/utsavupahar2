<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'featured' => 'in:on,null|nullable',
            'refundable' => 'in:on,null|nullable',
            'weight' => 'nullable|numeric',
            'dimension' => 'nullable|string',
            'purchase_price' => 'required|numeric',
            'discount_p' => 'nullable|numeric|max:100',
            'sell_margin_p' => 'nullable|numeric|max:100',
            'meta_word' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'selected_categories' => 'required|exists:categories,id',
            'selected_coupons' => 'nullable|exists:coupons,id',
            'images' => 'nullable',



            // Validation rules for each variant
            'variants' => 'required|max:255',
            'prices' => 'required',
            'status*' => 'required|in:inStock,Outofstock',
            'quantities' => 'required|array',
        ];
    }
}
