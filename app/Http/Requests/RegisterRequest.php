<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Fullname Required !',
            'name.string' => 'Fullname Required Text !',
            'name.max' => 'Fullname Only 50 Character !',

            'email.required' => 'Email Required !',
            'email.unique' => 'Email Already Registered !',

            'password.required' => 'Password Required !',
            'password.confirmed' => 'Unmatched Password Confirmation !'
        ];
    }
}
