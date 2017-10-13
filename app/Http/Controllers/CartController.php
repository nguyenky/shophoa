<?php

namespace App\Http\Controllers;

use Request;
use App\Flowers,Cart;

class CartController extends Controller
{
	
    public function update_Cart(){
        if(Request::ajax()){
           
            $slug 	= Request::get('slug');
            $qty 	= Request::get('qty');

            Cart::update($slug,$qty);
             echo "oke";

        }
    }
}
