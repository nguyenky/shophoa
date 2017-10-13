<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvsRequest extends FormRequest
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
            'name' => 'required|min:6 |max:255',
            'link'=>'required'
          
    ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống !!!!',
            'name.min' => 'Tên quảng cáo ít nhất 6 ký tự !!!!',
            
            'name.max' => 'Tên quảng cáo không được nhiều hơn 255 ký tự !!!!',


            'link.required'  => 'Không được để trống link !!!',

            

    ];
    }

}
