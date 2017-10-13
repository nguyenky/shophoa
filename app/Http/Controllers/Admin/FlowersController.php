<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flowers;
use App\Cats;
use App\Type;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Http\Requests\FlowersRequest;
use Illuminate\Support\Facades\Session;
class FlowersController extends Controller
{
    public function flowers(Request $request){
        $id_current = Auth::user()->id;
        if($id_current ==1 ){
        	$objItems = new Flowers();
            $arItems = $objItems->getFlowers();
            $arType = Type::all();
        }else {
            $objItems = new Flowers();
            $arItems = $objItems->getFlowers_mod($id_current);
            $arType = Type::all();
        }
        //-----------------------
         $request->session()->flash('active','flowers');	
    	return view("admin.flowers.flowers",[
    		"arItems"=>$arItems,
            "arType"=>$arType,
            "titleAdmin"=>"Products"
    		]);
    }
    public function flowers_cats(Request $request,$id){
        $id_current = Auth::user()->id;
        if($id_current ==1 ){

            $objItems = new Flowers();
            $arItems = $objItems->getFlowers_cats($id);
            $arType = Type::all();
        }else {
            $objItems = new Flowers();
            $arItems = $objItems->getFlowers_cats_mod($id,$id_current);
            $arType = Type::all();
        }
         $request->session()->flash('active','flowers');    
        return view("admin.flowers.flowers",[
            "arItems"=>$arItems,
            "arType"=>$arType,
            "titleAdmin"=>"Products",
            ]);
    }
    public function getAdd(){
        $arCats = Cats::all();
        $arType = Type::all();

    	return view("admin.flowers.add",[
            "arCats"=>$arCats,
            "arType"=>$arType,
            "titleAdmin"=>"Products",
            ]);
    }
    public function postAdd(FlowersRequest $request){
        $id_current = Auth::user()->id;
        $picname = $request->picture;
        if($request->picture != ''){
            $path    = $request->file('picture')->store('files');
            $tmp     =explode("/",$path);
            $picname = end($tmp);
        };
        if($request->discount !=''){
            $discount = $request->discount;
        }else{
            $discount = null;
        }
        if($request->type !=''){
            $type_id = $request->type;
        }else{
            $type_id = null;
        }
        $array      = array(
            'name'       => $request->name,
            'cats_id'    => $request->cats_id,
            'type'       => $type_id,
            'price'      => $request->price,
            'discount'   => $discount,
            'picture'    => $picname,
            'preview'    => $request->preview,
            'detail'     => $request->detail,
            'created_by' => $id_current
        );
        Flowers::insert($array);
        //lấy id của sản phẩm mới vừa thêm
        //-----------------
        $request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.flowers.flowers');
    }


    public function getEdit(Request $request,$id){
        $arItem_del = Flowers::find($id);
        $created_by = $arItem_del['created_by'];
        $id_current = Auth::user()->id;

        // echo $created_by;die();
        if(Auth::user()->id != 1 && ($id_current != $created_by) ){
            $request->session()->flash('msg','Bạn không thể thực hiện thao tác này !!');
            return redirect()->route('admin.flowers.flowers');
        }
            $arItem = Flowers::find($id);
            $arCats = Cats::all();
            $arType = Type::all();
            return view("admin.flowers.edit",[
                "arCats"=>$arCats,
                "arItem"=>$arItem,
                "arType"=>$arType,
                "titleAdmin"=>"Products",
            ]);
    }
    public function postEdit(FlowersRequest $request,$id){
        $arItem = Flowers::find($id);
        // xử lý hình ảnh
        $picNameOld = $arItem['picture'];
        $picNameNew = $request->picture;
        if($request->type !=''){
            $type_id = $request->type;
        }else{
            $type_id = null;
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

        $arItem->name=trim($request->name);
        $arItem->cats_id=$request->cats_id;
        $arItem->preview=$request->preview;
        $arItem->price=$request->price;
        $arItem->discount=$request->discount;
        $arItem->picture=$picname;
        $arItem->detail=$request->detail;
        $arItem->type=$type_id;
        
        
        $arItem->update();
        $request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.flowers.flowers');

    }
    public function del($id, Request $request){
        $arItem_del = Flowers::find($id);
        $created_by = $arItem_del['created_by'];
        $id_current = Auth::user()->id;

        // echo $created_by;die();
        if(Auth::user()->id != 1 && ($id_current != $created_by) ){
            $request->session()->flash('msg','Bạn không thể thực hiện thao tác này !!');
            return redirect()->route('admin.flowers.flowers');
        }
        
        $objItem= Flowers::find($id);
        $objItem->delete();
        /// Xóa hình
        $picName = $objItem['picture'];
        ///echo $picName;die();
        if($picName != ''){
            Storage::delete("files/$picName");

        }
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.flowers.flowers');
    }
    //--------------TÌM KIẾM-------
    public function search(Request $request){
        $search = $request->search;
        //setcookie("TestCookie","alo alo", time()+3600);
        $request->session()->flash('search',$search);
        //setcookie('search',$request->search,+3600);
        //echo $_COOKIE['search'];
        // if(Session::has('search')){
        //     echo Session::get('search');
        // }
        $id_current = Auth::user()->id;
        if($id_current ==1 ){
            $objItems = new Flowers();
            $arItems = $objItems->getFlowers_search($search);
            $arType = Type::all();
        }else {
            $objItems = new Flowers();
            $arItems = $objItems->getFlowers_mod_search($id_current,$search);
            $arType = Type::all();
        }
        //-----------------------
        $request->session()->flash('active','flowers');    
        return view("admin.flowers.flowers",[
            "arItems"=>$arItems,
            "arType"=>$arType,
            "titleAdmin"=>"Products"
            ]);
    }
}
