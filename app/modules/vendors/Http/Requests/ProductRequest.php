<?php

namespace Vendors\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'=>'required',
            'product_name'=>'required|alpha|max:100',
            'product_color'=>'required|alpha',
            'product_price'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'This Field is Required',
            'product_name.alpha' => 'Valid Product Name',
            'product_color.alpha' => 'Valid Product Color',
            'product_price.numeric' => 'Valid Product Price',
        ];
    }
}
