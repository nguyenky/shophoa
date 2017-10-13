<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function aboutus(Request $request){
    	$arItems = AboutUs::all();

         $request->session()->flash('active','aboutus');    
    	return view("admin.aboutus.aboutus",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"About Us"
    		]);
    }
    public function getAdd(){
    	return view("admin.aboutus.add");
    }
    public function postAdd(Request $request){
        if($request->active !=''){
            $active = $request->active;
        }else{
            $active = 0;
        }
        $array      = array(
            'name'   	=> $request->name,
            'active'   	=> $active,
            'content'   => $request->content,

        );
        AboutUs::insert($array);

        $request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.aboutus.aboutus');
    }
    public function getEdit($id){
    	$arItem = AboutUs::Find($id);
    	return view("admin.aboutus.edit",[
    		"arItem"=>$arItem,
            "titleAdmin"=>"About Us"
    		]);
    }
    public function postEdit(Request $request,$id){
    	if($request->active !=''){
            $active = $request->active;
        }else{
            $active = 0;
        }
    	$arEdit =AboutUs::Find($id);
    	$arEdit->name = $request->name;
    	$arEdit->active = $active;
    	$arEdit->content= $request->content;
    	$arEdit->update();
    	//--------------
    	$request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.aboutus.aboutus');
    	
    }
    public function del(Request $request,$id){
        $arDel = AboutUs::find($id);
        $arDel->delete();
        //--------------
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.aboutus.aboutus');
    }
}
