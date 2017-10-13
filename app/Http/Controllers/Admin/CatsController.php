<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cats;
use App\Http\Requests\CatsRequest;

class CatsController extends Controller
{
    public function cats(Request $request){
    	$arItems = Cats::all();

         $request->session()->flash('active','cats');    
    	return view("admin.cats.cats",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"Category"
    		]);
    }
    public function getAdd(){
    	return view("admin.cats.add");
    }
    public function postAdd(CatsRequest $request){
    	if($request->parent_id ==''){

    		$parent_id = 0;
    	}else {
    		$parent_id = $request->parent_id;
    	}
    	$array = array(
    		'name'=> $request->name,
    		'parent_id'=>$parent_id,
    		);
    	Cats::insert($array);
    	//--------------
    	$request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.cats.cats');
    }
    public function getEdit($id){
    	$arItem = Cats::Find($id);
    	return view("admin.cats.edit",[
    		"arItem"=>$arItem,
            "titleAdmin"=>"Category"
    		]);
    }
    public function postEdit(CatsRequest $request,$id){

    	$arEdit =Cats::Find($id);
    	$arEdit->name = $request->name;
    	$arEdit->parent_id= $request->parent_id;
    	$arEdit->update();
    	//--------------
    	$request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.cats.cats');
    	
    }
    public function del(Request $request,$id){
        $arDel = Cats::find($id);
        $arDel->delete();
        //--------------
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.cats.cats');
    }
}
