<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Cart;

class AuthController extends Controller
{
    public function getLogin(){
    	return view("admin.auth.login");
    }
    public function postLogin(Request $request){
    	$username 	= trim($request->username);
    	$password 	= trim($request->password);

    	if (Auth::attempt(['username' => $username, 'password' => $password]))
	        {   
                $arUser = Auth::user();
                if($arUser['roles'] ==3){
                   return redirect()->route('public.flowers.flowers');

                }else{ 
	               return redirect()->route('admin.flowers.flowers');
                }
	        }else
	        {
	        	$request ->Session()->flash('msg','Sai Username hoặc Password !!!');
	            return redirect()->back();

	        }
    	
    }
    public function logout(){
    	Auth::logout();
        Cart::destroy();
    	return redirect()->route('public.index.index');
    }
    public function error(){
    	return view("admin.auth.error");
    }
}
