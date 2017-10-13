<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            //
        'name' => 'required|max:50 |min:3|unique:contacts,name',
        'email' => 'required|email|unique:contacts,email',
        // 'email' => 'required|email',
        'phone' => 'required '

        ];
    }
    public function messages()
    {
    return [
        'name.required' => 'Tên không được để trống  !!!',
        'name.max' => 'Tên quá dài  !!!',
        'name.min'  => 'Tên quá ngắn !!! ',
        //----------------------------------------
        'email.required' => 'Email không được để trống !!!',
        'email.email' => 'Điền vào một email  !!!',
        'email.unique' => 'Email đã tồn tại  !!!',
        //------------------------------------------
        'phone.required'  => 'Số điện thoại không được để trống!!! ',
    ];
    }
}
