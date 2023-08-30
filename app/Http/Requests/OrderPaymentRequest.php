<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderPaymentRequest extends FormRequest
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

            'payment' => [
                'required',
                'numeric',
                Rule::exists('checkouts', 'total')->where(function ($query) {
                    $query->where('total', '<=', $this->payment);
                }),
            ],
        ];
    }

    public function messages()
    {
        return [

            'payment.required' => 'Payment is required!',
            'payment.numeric' => 'Payment must be a number!',
            'payment.exists' => 'Payment must be total !',
        ];
    }
}
