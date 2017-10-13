<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ContactsRequest;

class ContactsController extends Controller
{
    public function getContacts(){
    	return view("contacts.contacts",[
    		"titlePublic"=>'Liên hệ'
    		]);
    }
    public function postContacts(ContactsRequest $request){

        $mail = $request->email;
    	$array         = array(
    		'name'    =>$request->name,
    		'email'   =>$request->email,
    		'phone'   =>$request->phone,
    		'message' =>$request->message
    		);
        Contacts::insert($array);
        $data = ['hoten'=>'jelo'];
        Mail::send('admin.mail.blanks',$data,function($msg ){
            //$msg->from('lenguyenky1801@gmail.com','LNK');
            
            $msg ->from('lenguyenky1801@gmail.com','Nguyên Ký');
            $msg ->to(Input::get('email'),'Uchiha')->subject('Mời bạn tham khảo các sản phẩm khuyến mãi của chúng tôi');

        });
    	//----------------
    	$request->session()->flash('msg','Chúng tôi sẽ liên hệ với bạn sớm nhất ! xin cảm ơn :) !');	
    	return view("contacts.contacts",[
    		"titlePublic"=>'Liên hệ'
    		]);

    }
}
