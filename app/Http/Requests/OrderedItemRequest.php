<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderedItemRequest extends FormRequest
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
            'product_attribute_id' => 'required',
            'product_color' => 'required',
            'product_name' => 'required',
            'product_color' => 'required',
            'product_code' => 'required',
            'size' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'condition' => 'nullable',
            'products_id' => 'required',
        ];
    }
}
