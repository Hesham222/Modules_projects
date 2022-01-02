<?php

namespace Admins\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class confirmPasswordRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ];
    }
    public function  messages()
    {
        return [
            'current_password.required' => ' Current Password is Required',
            'new_password.required' => 'Current Password is Required',
            'confirm_password.required' => 'Confirm Password is Required',
        ];

    }

}
