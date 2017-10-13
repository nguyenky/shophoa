<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\Orders;
use App\Contacts;
use App\Pays;

use App\Order_detail;
use Cart;

class PayController extends Controller
{
    public function payInfo(){
        
    	return view("pay.payInfo");
    }
    public function payConfirm(){
        $pay_id         = Request::get('thanhtoan');
        $payment        = Pays::find($pay_id);
        $thongtinthem = Request::get('thongtinthem');



    	return view("pay.payConfirm",[
            'payment'=>$payment,
            "thongtinthem"=>$thongtinthem

            ]);
    }


    public function payConfirm_guest($id){
        $pay_id         = Request::get('thanhtoan');
        $payment        = Pays::find($pay_id);
        //-------------------
        $arItem         = Contacts::where('id','=',$id)->first();
        //-------------------
        $thongtinthem = Request::get('thongtinthem');
        //------------------
        return view("pay.payConfirm_guest",[
            'arItem'=>$arItem,
            'payment'=>$payment,
            "thongtinthem"=>$thongtinthem
            ]);
    }


    public function formatPay(){
    	// xữ lý chuyển hướng thanh toán, nếu mà thanh toán sau khi đăng 
    	//nhập thì sẽ chuyển qua trang thông tin thanh toán, nếu chưa đăng nhập thì sẽ chuyển qua trang đăng ký

    	$arUser = Auth::user();
        $arPays = Pays::all();

    	if($arUser['id']!=''){
    		return view("pay.payInfo",[
    		"arUser"=>$arUser,
            "arPays"=>$arPays
    		]);
    	}else{
    		return redirect()->route('public.login.login');

    	}

    }
    public function order(){
        $thongtinthem   = Request::get('thongtinthem');
        $pays           = Request::get('pays');
        $arUser         = Auth::user();
            $user_id    = $arUser['id'];
            $user_name  = $arUser['fullname'];
            $user_phone = $arUser['phone'];
            $user_email = $arUser['email'];

        $arCart = Cart::content();
        $total = Cart::subtotal();
        $array = array(
            'status'        =>0,
            'active'        =>0,
            'ship'          =>0,
            'user_id'       =>$user_id,
            'user_name'     =>$user_name,
            'user_email'    =>$user_email,
            'user_phone'    =>$user_phone,
            'amount'        =>$total,
            'payment_info'  =>$pays,
            'message'       =>$thongtinthem,
            'security'      =>1,
            );

        $order = Orders::insertGetId($array);       
        //-------------------
        $count = Cart::content()->count();
        //-----------------
        foreach($arCart as $key => $value){
            $product_id = $value->id;
            $qty        = $value->qty;
            $price      = $value->price;

            $array = array(
                'order_id'  =>$order,
                'product_id'=>$product_id,
                'qty'       =>$qty,
                'amount'    =>($qty*$price),
                );
            Order_detail::insert($array);
        }
        //-------------
        Cart::destroy();


        return redirect()->route('public.flowers.flowers');
    }
    public function order_guest($id){
        $thongtinthem    = Request::get('thongtinthem');
        $pays            = Request::get('pays');
    	$arUser          = Contacts::where('id','=',$id)->first();

			$user_name   = $arUser['name'];
			$user_phone  = $arUser['phone'];
            $user_email  = $arUser['email'];
			$message     = $arUser['message'];
            $user_id     = null;
		$arCart   = Cart::content();
		$total    = Cart::subtotal();
    	$array    = array(
    		'status'		=>0,
    		'active'		=>0,
            'ship'          =>0,
    		'user_id'		=>$user_id,
    		'user_name'		=>$user_name,
    		'user_email'	=>$user_email,
    		'user_phone'	=>$user_phone,
            'user_address'  =>$message,
    		'amount'		=>$total,
    		'payment_info'	=>$pays,
    		'message'		=>$thongtinthem,
    		'security'		=>1,
    		);

    	$order = Orders::insertGetId($array);   	
    	//-------------------
    	$count = Cart::content()->count();
    	foreach($arCart as $key => $value){
    		$product_id = $value->id;
    		$qty 		= $value->qty;
    		$price 		= $value->price;

   			$array = array(
   				'order_id'	=>$order,
   				'product_id'=>$product_id,
   				'qty'		=>$qty,
   				'amount'	=>($qty*$price),
   				);
   			Order_detail::insert($array);
    	}

    	Cart::destroy();


    	return view('pay.payComplate');
    }
    public function payComplate(){
        return view('pay.payComplate');
    }
}
