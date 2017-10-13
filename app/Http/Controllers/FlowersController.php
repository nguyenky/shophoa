<?php

namespace App\Http\Controllers;


use App\Flowers,Cart;

use Illuminate\Http\Request;

class FlowersController extends Controller
{
    //nên comment cho kỹ nhé
    public function flowers(){
    	$arItems = Flowers::orderBy('id','DESC')->paginate(12);
    	return view("flowers.flowers",[
    		"arItems"=>$arItems
    		]);
    }
    //
    public function detail(){
    	return view("flowers.detail");
    }
    //
    public function giaoDich(Request $request,$id){
    	$pty  = $request->number;
    	$array = Flowers::where('id',$id)->first();
         // $n =$array->picture; echo $n ;die();
    	Cart::add(array(
    		'id'      =>$id,
    		'name'    => $array->name,
    		'qty'     =>$request->number,
    		'price'   =>$array->price,
    		'options'  =>array("img"=>$array->picture),   
    		));
    	return redirect()->back();
    }
    //
    public function cart(){
    	$content   = Cart::content();
    	$subtotal  = Cart::subtotal();
    	// return view("flowers.cart",[
    	// 	"content"=>$content,
    	// 	"subtotal"=>$subtotal
    	// 	]);
        return view("flowers.cart",compact('content'));
    }
    public function del_Cart($slug){
        
        Cart::remove($slug);
        return redirect()->route('public.flowers.cart');   
    }

    // public function update_Cart(Request $request){
    //     if(Request::ajax()){
           
    //         $slug = Request::get('slug');
    //         $qty = Request::get('qty');

    //         Cart::update($slug,$qty);
    //          echo "oke";

    //     }
    // }
    ///----------TÌM KIẾM---------
    
}
