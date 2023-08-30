<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name_product' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size limit as needed
        ];
    }

    public function messages()
    {
        return [
            'name_product.required' => 'Name Required !',

            'price.required' => 'Price Required !',
            'qty.required' => 'Qty Stock Required !',

            'image_product.required' => 'Product only extension (JPG, JPEG, PNG, GIF)!',
            'image_product.image' => 'The uploaded file must be an image.',
            'image_product.mimes' => 'The uploaded image must be in JPG, JPEG, PNG, or GIF format.',
            'image_product.max' => 'The uploaded image size must not exceed 2MB.',
        ];
    }
}
