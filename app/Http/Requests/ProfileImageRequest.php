<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImageRequest extends FormRequest
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
            'images_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size limit as needed
        ];
    }

    public function messages()
    {
        return [
            'images_profile.required' => 'Logo only extension (JPG, JPEG, PNG, GIF)!',
            'images_profile.image' => 'The uploaded file must be an image.',
            'images_profile.mimes' => 'The uploaded image must be in JPG, JPEG, PNG, or GIF format.',
            'images_profile.max' => 'The uploaded image size must not exceed 2MB.',
        ];
    }
}
