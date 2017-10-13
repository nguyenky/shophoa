<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flowers;

class CatsController extends Controller
{
    public function gift(){
    	$arItems = Flowers::orderBy('id','DESC')->where('type','=','5')->paginate(12);
    	return view("flowers.flowers",[
    		"arItems"=>$arItems
    		]);
    }
    public function cats($id){
    	$arItems = Flowers::orderBy('id','DESC')->where('cats_id','=',$id)->paginate(12);
    	return view("flowers.flowers",[
    		"arItems"=>$arItems
    		]);
    }
}
