<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flowers;
use App\Products;

class CatsController extends Controller
{
    public function gift(){
    	$arItems = Flowers::orderBy('id','DESC')->where('type','=','5')->paginate(12);
    	return view("flowers.flowers",[
    		"arItems"=>$arItems
    		]);
    }
    public function cats($slug,$id){
    	$arrItems = Products::orderBy('id','DESC')->where('category_id','=',$id)->limit(12)->get();
    	return view("public.products_cat",[
    		"arrItems"=>$arrItems
    		]);
    }
}
