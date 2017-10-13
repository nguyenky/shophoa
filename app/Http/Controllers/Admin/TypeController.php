<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use App\Http\Requests\TypeRequest;


class TypeController extends Controller
{
    public function type(Request $request){
    	$arItems=Type::all();
        $request->session()->flash('active','type');
    	return view("admin.type.type",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"Type",
    		]);
    }
    public function getAdd(){
    	return view("admin.type.add");
    }
    public function postAdd(TypeRequest $request){
    	
    	$array = array(
    		'name'=> $request->name,
    		
    		);
    	Type::insert($array);
    	//--------------
    	$request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.type.type');
    }
    public function getEdit($id){
    	$arItem = Type::Find($id);
    	return view("admin.type.edit",[
    		"arItem"=>$arItem,
            "titleAdmin"=>"Type",

    		]);
    }
    public function postEdit(TypeRequest $request,$id){

    	$arEdit =Type::Find($id);
    	$arEdit->name = $request->name;
    	$arEdit->update();
    	//--------------
    	$request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.type.type');
    	
    }
    public function del(Request $request,$id){
        $arDel = Type::find($id);
        $arDel->delete();
        //--------------
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.type.type');
    }
    public function delAll(){
        echo "alo alo";
    }
}
