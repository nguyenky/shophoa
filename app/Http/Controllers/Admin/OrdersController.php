<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;

class OrdersController extends Controller
{
    public function orders(Request $request){
    	$objOrders = new Orders;
    	$arItems = $objOrders->getOrders();
        $request->session()->flash('active','orders');
    	return view("admin.orders.order",[
    		'arItems'=>$arItems,
            "titleAdmin"=>"Orders",
    		]);
    }
    public function del(Request $request,$id){
    	$objItem= Orders::find($id);
        $objItem->delete();
        //---------
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.orders.orders');
    }
    public function update_status(){
        // $arItem = Orders::find($id);
        // $arItem->status=$request->cats_id;

        // $arItem->update();
        // if(Request::ajax()){
        //     echo "oke";
        // }
        echo "oke";
    }
}
