<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contacts;


class ContactsController extends Controller
{
    public function contacts(Request $request){
        	$arItems = Contacts::orderBy('id','DESC')->paginate(10);
        //-----------------------
         $request->session()->flash('active','contacts');	
    	return view("admin.contacts.contacts",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"Contacts"
    		]);
    }
    public function del($id, Request $request){       
        $objItem= Contacts::find($id);
        $objItem->delete();
        $request->session()->flash('msg','Xóa thành công !!');
        return redirect()->route('admin.contacts.contacts');
    }
}
