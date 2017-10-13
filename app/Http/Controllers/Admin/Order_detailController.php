<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order_detail;
use App\Orders;

class Order_detailController extends Controller
{
    public function Order_detail (Request $request,$id){
        $objOder_detail = new Order_detail;
        $arItems = $objOder_detail -> getOrder_detail($id);
        $allAmount = Orders::select('amount')->where('id','=',$id)->first();
        $request->session()->flash('active','orders');           
        return view("admin.orders.order_detail",[
            "arItems"=>$arItems,
            "allAmount"=>$allAmount,
            "titleAdmin"=>"Orders",
            ]);
    }
    
}