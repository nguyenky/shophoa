<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flowers;

class IndexController extends Controller
{
    public function index(Request $request){
        $arItems = Flowers::all();
        $request->session()->flash('active','index');	
    	return view("admin.index.index",[
    		"arItems"=>$arItems,

    		]);
    }


    
}
