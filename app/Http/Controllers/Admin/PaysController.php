<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pays;
use App\Http\Requests\PaysRequest;

class PaysController extends Controller
{
    public function pays(Request $request){
    	$arItems = Pays::all();
        $request->session()->flash('active','pays');
    	return view("admin.pays.pays",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"Payments",
    		]);
    }
    public function getAdd(){
    	return view("admin.pays.add");
    }
    public function postAdd(PaysRequest $request){
    	
    	$array = array(
    		'name'=> $request->name,
    		'document'=>$request->document
    		);
    	Pays::insert($array);
    	//--------------
    	$request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.pays.pays');
    }
    public function getEdit($id){
    	$arItem = Pays::Find($id);
    	return view("admin.pays.edit",[
    		"arItem"=>$arItem,
            "titleAdmin"=>"Payments",
    		]);
    }
    public function postEdit(PaysRequest $request,$id){

    	$arEdit =Pays::Find($id);
    	$arEdit->name = $request->name;
    	$arEdit->document= $request->document;
    	$arEdit->update();
    	//--------------
    	$request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.pays.pays');
    	
    }
    public function del(Request $request,$id){
        $arDel = Pays::find($id);
        $arDel->delete();
        //--------------
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.pays.pays');
    }
}
