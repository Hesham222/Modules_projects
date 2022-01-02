<?php

namespace Admins\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateAdminDetailsRequest extends FormRequest
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
            'admin_name' => 'required|string',
            'admin_mobile' => 'required',
        ];
    }
    public function  messages()
    {
        return [
            'admin_name.required' => ' Name is Required',
            'admin_name.string' => 'Valid Name is Required',
            'admin_mobile.required' => ' Mobile is Required',
        ];

    }

}
