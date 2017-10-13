<?php

namespace App\Http\Controllers;

use Request;
use App\Contacts;
use App\Pays;
use App\User;
use Mail;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{
    public function login(){
    	return view("login.login");
    }
    public function postLogin(){
    	$register = Request::get('register');
    	if( $register =='register'){
    		return redirect()->route('public.login.register');
    	}elseif ($register =='guest') {
    		return redirect()->route('public.login.guest');
    	}
    }

    public function register(){
    	return view("login.register");
    }
    public function guest(){
        return view('login.guest');
    }
    public function guestInfo(){
        
        //chổ này mình sẽ thêm thông tin khách hàng vào liên hệ lun
        $array = array(
            'name'  => Request::get('name'), 
            'phone'     => Request::get('phone'), 
            'email'     => Request::get('email'), 
            'message'   => Request::get('address'),
        );
        $id_Contact = Contacts::insertGetId($array);
        $arUser = Contacts::where('id','=',$id_Contact)->first();
        //-----
        $arPayments = Pays::all();
    	return view("pay.payInfo_guest",[
            'arUser'=>$arUser,
            "arPayments"=>$arPayments
            
            ]);
    }
    public function getForgetPassword(){
        return view('login.forgetPassword');
    }
    public function postForgetPassword(){
        $email = Request::get('email');
        $username = Request::get('username');

        $confirm = User::where('username','=',$username)->first();
        if($confirm == false){
            return redirect()->route('public.login.forgetPassword')->with('msg','Username không tồn tại !!');
        }else{
            if($confirm['email'] == $email){
                //$password =  $confirm['password'];
                //------đổi pass
                    $ramPassword = mt_rand(10000,999999);
                    $confirm->password = bcrypt($ramPassword);
                    $confirm->update();
                //-------
                $data = ['password'=>$ramPassword];
                Mail::send('admin.mail.repass',$data,function($msg ){
                    //$msg->from('lenguyenky1801@gmail.com','LNK');
                    
                    $msg ->from('lenguyenky1801@gmail.com','Nguyên Ký');
                    $msg ->to(Input::get('email'),'Uchiha')->subject('Kiểm tra thông tin của bạn !!');

                });
                //--------------------
                return redirect()->route('public.login.forgetPassword')->with('msgs','Kiểm tra mail để lấy lại mật khẩu !!!');
        }else{
            return redirect()->route('public.login.forgetPassword')->with('msg','Xác nhận email không đúng !!');
        }
        }
        

        
    }
}
