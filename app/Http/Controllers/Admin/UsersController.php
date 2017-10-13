<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\EditPassword;

class UsersController extends Controller
{
    public function users(Request $request){
    	$arItems = User::orderBy('roles','ASC')->paginate(5);
         $request->session()->flash('active','users');	
    	return view("admin.users.users",[
    		"arItems"=>$arItems,
            "titleAdmin"=>"Users",

    		]);
    }
    public function getAdd(){
    	return view("admin.users.add",[
            "titleAdmin"=>"Users",
            ]);
    }
    public function postAdd(UsersRequest $request){
    	$array = array(
    		'username'=>$request->username,
    		'roles'=>$request->roles,
    		'password'=>bcrypt($request->password),
    		'fullname'=>$request->fullname,
            'email'=>$request->email,
    		'phone'=>$request->phone,
    		'address'=>$request->address

    		);
    	User::insert($array);
    	//--------------
    	$request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('admin.users.users');

    }
    //--------------------------
    // dùng chung controller Admin để đăng ký người dùng
    // lấy thông tin từ trang login.register ( phần public) và thêm thông tin vào model User,
    // sau đó trả về trang public.pay.payInfo ( trang thông tin thanh toán) ( nhớ là phải dùng method "get" bên route )
    public function postAdd_Public(UsersRequest $request){
        $roles = 3;
        $array = array(
            'username'=>$request->username,
            'roles'=> $roles,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'fullname'=>$request->fullname,
            'phone'=>$request->phone,
            'address'=>$request->address

            );
        User::insert($array);
        //--------------
        $request->session()->flash('msg','Thêm thành công !!');
        return redirect()->route('public.flowers.flowers');

    }

    public function getEdit(Request $request,$id){
        $arItem = User::Find($id);
        $roles =  $arItem['roles'];
        if(Auth::user()->id != 1 && ($id ==1 || (($roles  ==2) && (Auth::user()->id != $id) ))){
                $request->session()->flash('msg','Bạn không được phép sửa người dùng này !!');
                return redirect()->route('admin.users.users');
            }
        return view("admin.users.edit",[
            "arItem"=>$arItem
            ]);
    }
    public function postEdit(EditPassword $request,$id){
        $arEdit =   User::Find($id);
        if($request->roles !=''){
            $roles = $request->roles;
        }else{
            $roles = $arEdit['roles'];
        }

        
        $arEdit->username   = $request->username;
        $arEdit->roles      = $roles;
        if($request->password !=''){
            $arEdit->password = bcrypt($request->password);
        }
        $arEdit->email      = $request->email;
        $arEdit->fullname   = $request->fullname;
        $arEdit->phone      = $request->phone;
        $arEdit->address    = $request->address;
        $arEdit->update();
        //--------------
        $request->session()->flash('msg','Sửa thành công !!');
        return redirect()->route('admin.users.users');
        
    }
    public function del(Request $request,$id){
        $arDel          = User::find($id);
        $roles_del      = $arDel['roles'];
        //------
        $id_current     = Auth::user()->id;
        $arCurrent      = User::find($id_current);
        $roles_current  = $arCurrent['roles'];
        //---------
        // echo $roles_current;die();
        //nếu người dùng là mod 
        if(($id ==1) ||( $id_current != 1 && $roles_del == 2)){
            $request->session()->flash('msg','Bạn không được phép xóa người dùng này  !!');
            return redirect()->route('admin.users.users');
        }else{
            $arDel->delete();
            //--------------
            $request->session()->flash('msg','Xóa thành công !!');
            return redirect()->route('admin.users.users');

        }
        
    }
}
