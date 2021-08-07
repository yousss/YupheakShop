<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
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
            'users_email' => 'nullable',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'nullable',
            'country' => 'nullable',
            'pincode' => 'nullable',
            'mobile' => 'required|min:9|max:11',
            'users_id' => 'required'
        ];
    }
}
