<?php

namespace App\Http\Controllers;

use Request;
use App\Orders;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{
   public function postUpdateStatus()
   {
   		$status   = Input::get('status');
   		$id  	    = Input::get('id');
   		$arItem   = Orders::find($id);
   		$arItem   ->status = $status;
   		$arItem   ->update();
   		// $arItem->update();
  	    die(json_encode(1));// có thể dùng return redirect()->back();
   }

   public function postUpdateActive()
   {
   		$active   = Input::get('active');
   		$id  	    = Input::get('id');
   		$arItem   = Orders::find($id);
   		$arItem   ->active = $active;
   		$arItem   ->update();
   		// $arItem->update();
  	    die(json_encode(1));// có thể dùng return redirect()->back();
   }
   public function postUpdateShip()
   {
   		$ship     = Input::get('ship');
   		$id  	    = Input::get('id');
   		$arItem   = Orders::find($id);
   		$arItem   ->ship = $ship;
   		$arItem   ->update();
   		// $arItem->update();
  	    die(json_encode(1));// có thể dùng return redirect()->back();
   }
}
