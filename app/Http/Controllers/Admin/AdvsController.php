<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advs;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdvsRequest;

class AdvsController extends Controller
{
    public function advs(Request $request){
        	$arItems = Advs::all();
        //-----------------------
         $request->session()->flash('active','advs');	
    	return view("admin.advs.advs",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"Advs"
           
    		]);
    }
    public function getAdd(){


    	return view("admin.advs.add",[
            "titleAdmin"=>"Advs"
            ]);
    }
    public function postAdd(AdvsRequest $request){
        
        $picname = $request->picture;
        if($request->picture != ''){
            $path    = $request->file('picture')->store('files');
            $tmp     =explode("/",$path);
            $picname = end($tmp);
        };
        if($request->active !=''){
            $active = $request->active;
        }else{
            $active = 0;
        }
        $array      = array(
            'name'   	=> $request->name,
            'link'   	=> $request->link,
            'active'   	=> $active,
            'picture'   => $picname,

        );
        Advs::insert($array);
        //lấy id của sản phẩm mới vừa thêm
        //-----------------
        $request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.advs.advs');
    }


    public function getEdit(Request $request,$id){
        $arItem = Advs::find($id);
            return view("admin.advs.edit",[
                "arItem"=>$arItem,
                "titleAdmin"=>"Advs"              
            ]);
    }
    public function postEdit(AdvsRequest $request,$id){
        $arItem = Advs::find($id);
        // xử lý hình ảnh
        $picNameOld = $arItem['picture'];
        $picNameNew = $request->picture;
        if($request->active !=''){
            $active = $request->active;
        }else{
            $active = 0;
        }
        if($picNameNew != ''){
            //có úp hinhf mới
            $path = $request->file('picture')->store('files');
            $tmp =explode("/",$path);
            $picname = end($tmp);
            //xóa hình cũ
            if($picNameOld != ''){
            Storage::delete("files/{$picNameOld}");
            }
        }

        else{
            if($request->delete_picture == 1){
                Storage::delete("files/{$picNameOld}");
                $picname = "";

            }else
            {
                $picname = $picNameOld;
            }
        }

        $arItem->name 		=trim($request->name);
        $arItem->link 		=$request->link;
        $arItem->active 	=$active;
        $arItem->picture 	=$picname;
        $arItem->update();
        $request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.advs.advs');

    }
    public function del($id, Request $request){       
        $objItem= Advs::find($id);
        $objItem->delete();
        /// Xóa hình
        $picName = $objItem['picture'];
        ///echo $picName;die();
        if($picName != ''){
            Storage::delete("files/$picName");

        }
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.advs.advs');
    }
}
