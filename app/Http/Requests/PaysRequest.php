<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaysRequest extends FormRequest
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
            'name'      => 'required|min:6 |max:255',
            'document'  => 'required|min:6',


          
    ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Phương thức thanh toán không được để trống !!!!',
            'name.min' => 'Phương thức thanh toán  ít nhất 6 ký tự !!!!',
            'name.max' => 'Phương thức thanh toán  nhiều nhất 255 ký tự !!!!',
            
            'document.required' => 'Hướng dẫn không được để trống !!!!',
            'document.min' => 'Hướng dẫn ít nhất 6 ký tự !!!!',

    ];
    }

}
