<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flowers;
use App\Products;
class IndexController extends Controller
{
    public function index(){
    	$arrItems = Products::orderBy('id','ASC')->limit(9)->get();
        // $tags = \App\Tags::all()->toArray();
        // $arItems_news = Flowers::orderBy('id','DESC')->where('type','=',2)->paginate(8);
        // $url = url();
        // $urlCurrent =url()->current();
        // dd($urlCurrent);
    	// return view("index.index",[
     //        "arItems"     =>$arItems,
    	// 	"arItems_news"     =>$arItems_news,
    	// 	"titlePublic" =>'Trang chủ'
    	// 	]);
        return view("public.index",[
            'arrItems' => $arrItems->toArray(),
            // 'tags'     => $tags
        ]);
    }
    public function detail($slug,$id){
    	$arItem         = Flowers::find($id);;
        $cats_id        = $arItem['cats_id'];
        $arItemsLQ      = Flowers::where('cats_id','=',$cats_id)->where('id','<>',$id)->get();
    	return view("flowers.detail",[
    		"titlePublic" =>$arItem['name'],
    		"arItem"      =>$arItem,
            "arItemsLQ"   =>$arItemsLQ

    		]);
    }
    public function aboutus(){
        return view("index.aboutus",[
            "titlePublic"=>'About Us',

            ]);
    }
    public function demo (){
        return view("admin.index.demo");
    }
}
