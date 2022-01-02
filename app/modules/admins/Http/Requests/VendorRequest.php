<?php

namespace Admins\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'vendor_name' => 'required',
            'vendor_mobile' => 'required',
            'vendor_email' => 'required',
            'area_id' => 'required',
            'vendor_password' => 'required',
        ];
    }
    public function  messages()
    {
        return [
            'vendor_name.required' => 'Name is Required',
            'vendor_mobile.required' => 'Email is Required',
            'vendor_email.email' => 'Valid Email',
            'area_id.required' => 'Area is Required',
            'vendor_password.required' => 'Password is Required'
        ];

    }
}
