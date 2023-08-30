<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutCartRequest extends FormRequest
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
     */ public function rules(): array
    {
        return [
            'user_id' => 'required',
            'product_id' => 'required',
            'qty' => [
                'required',
                'numeric',
                Rule::exists('products', 'id_product')->where(function ($query) {
                    $query->where('qty', '>=', $this->qty);
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User ID is required!',
            'product_id.required' => 'Product ID is required!',
            'qty.required' => 'Quantity is required!',
            'qty.numeric' => 'Quantity must be a number!',
            'qty.exists' => 'Quantity exceeds available stock!',
        ];
    }
}
