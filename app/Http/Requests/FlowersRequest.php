<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlowersRequest extends FormRequest
{
     public function authorize()
    {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:255 ',
            'price' => 'required | numeric',
            'preview' => 'required|min:6',
            'detail' => 'required|min:6',
            

          
    ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Sản phẩm không được để trống !!!!',
            'name.min' => 'Sản phẩm phải có ít nhất 6 ký tự !!!!',
            'name.max' => 'Sản phẩm không được nhiều hơn 255 ký tự !!!!',
            'name.unique' => 'Sản phẩm đã tồn tại !!!!',
            //////////////////////////////////////////
            'price.required' => 'Không được để trống giá sản phẩm !!!!',
            'price.numeric' => 'Nhập giá !!!!',
            ///////////////////////////////////////////
            'preview.required' => 'Mô tả không được để trống !!!!',
            'preview.min' => 'Mô tả phải có ít nhất 6 ký tự !!!!',
            
            //////////////////////////////////////////
            'detail.required' => 'Chi tiết không được để trống !!!!',
            'detail.min' => 'Chi tiết phải có ít nhất 6 ký tự !!!!',
            //////////////////
           

            
            

    ];
    }
}
