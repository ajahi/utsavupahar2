<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class RegistrationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob'=>['required','date','before:-13 years'],
            'phone_number'=>['required','min:10','numeric','regex:/^(98|97)\d{8}$/']
        ];
    }

    public function messages(): array
    {
        return[
            'phone.required'=>'We need to contact you',
            'phone_number.regex'=>'Input valid Nepali phone number',
            'dob.before'=>'User must be atleast 13 years old',
            'email.email'=>'Enter a valid email to recieve coupons.'
        ];
    }
}
