<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatsRequest extends FormRequest
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
            'name' => 'required|min:6 |max:255 |unique:cats,name',

          
    ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống !!!!',
            'name.min' => 'Tên quảng cáo ít nhất 6 ký tự !!!!',
            
            'name.max' => 'Tên quảng cáo không được nhiều hơn 255 ký tự !!!!',




            

    ];
    }

}
