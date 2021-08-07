<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required',
            'note' => 'required',
            'paid_by' => 'required',
            // 'discount_amount' => 'nullable',
            // 'tax_rate' => 'nullable',
            // 'is_paid' => 'required',
            'customer_id' => 'required',
            // 'shipping_charges' => 'nullable',
            // 'coupon_code' => 'nullable',
            // 'coupon_amount' => 'nullable',
            // 'shipping_address' => 'nullable',
            // 'users_email' => 'nullable',
            'amount' => 'required',
            'itemIds' => 'required',
            'total_qty' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_id.required' => 'Please select a customer',
        ];
    }
}
