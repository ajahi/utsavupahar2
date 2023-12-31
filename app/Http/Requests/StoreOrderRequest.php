<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'status' => 'in:pending,processing,completed,canceled',
            'product_ids'=>'required|exists:products,id'
        ];
    }
}
