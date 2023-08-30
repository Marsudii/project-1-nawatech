<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ProfilePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'password' => 'confirmed',
        ];
    }

    public function messages()
    {
        return [

            'name.string' => 'Fullname Required Text !',
            'name.max' => 'Fullname Only 50 Character !',
            'password.confirmed' => 'Unmatched Password Confirmation !'

        ];
    }
}
