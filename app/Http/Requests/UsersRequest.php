<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        'username' => 'required|min:3 | max:100 | unique:users,username',
        'address' => 'required|min:3 | max:100',
        'phone' => 'required|min:3 | max:100',
        'email' => 'required|min:3 | max:100 | unique:users,email',
        'fullname' => 'required|min:3 | max:100',
        'password' => 'required|min:3 | max:100',
        'repassword'=>'same:password',
        // 'role'=> 'required'


    ];
    }
    public function messages()
    {
    return [
        'username.required' => 'Không được để trống Username !!!',
        'username.min' => 'Username không được nhỏ hơn 6 ký tự  !!!',
        'username.max' => 'Username không được lớn hơn 100 ký tự  !!!',

        'fullname.required' => 'Không được để trống fullname !!!',
        'fullname.min' => 'fullname không được nhỏ hơn 6 ký tự  !!!',
        'fullname.max' => 'fullname không được lớn hơn 100 ký tự  !!!',

        'password.required' => 'Không được để trống password !!!',
        'password.min' => 'password không được nhỏ hơn 6 ký tự  !!!',
        'password.max' => 'password không được lớn hơn 100 ký tự  !!!',
        'repassword.same' => 'Mật khẩu không đúng !!!',
        'role.required'=>'Chọn phân quyền !!!'
        
        



        
    ];
    }
}