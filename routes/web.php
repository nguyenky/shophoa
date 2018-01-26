<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::pattern('id','([0-9]*)');
Route::pattern('pid','([0-9]*)');
Route::pattern('stt','([0-9]*)');
Route::pattern('qty','([0-9]*)');
Route::pattern('slug','(.*)');
Route::pattern('all','(.*)');



//---------PUBLIC-------------


Route::get('count','U23VietNam@count');
Route::get("demo",[
    "uses"=>"IndexController@demo",
    "as"=>"public.index.demo"
        ]);

Route::get("/",[
    "uses"=>"IndexController@index",
    "as"=>"public.index.index"
        ]);
Route::get("{slug}-{id}",[
    "uses"=>"CatsController@cats",
    "as"=>"public.cats.cats"
        ]);
Route::group(['prefix' => 'flowers'], function () {
    Route::get("san-pham",[
        "uses"=>"FlowersController@flowers",
        "as"=>"public.flowers.flowers"
            ]);
    Route::get("qua-tang-noi-bat",[
        "uses"=>"CatsController@gift",
        "as"=>"public.flowers.gift"
            ]);
    Route::get("chi-tiet-san-pham-{slug}-{id}.html",[
        "uses"=>"IndexController@detail",
        "as"=>"public.flowers.detail"
            ]);
    Route::post("chi-tiet-san-pham-{id}.html",[
        "uses"=>"FlowersController@giaoDich",
        "as"=>"public.flowers.giaodich"
            ]);
    Route::get("gio-hang",[
        "uses"=>"FlowersController@cart",
        "as"=>"public.flowers.cart"
            ]);
    Route::get("xoa-san-pham-{slug}",[
        "uses"=>"FlowersController@del_Cart",
        "as"=>"public.flowers.del"
            ]);
    Route::get("cap-nhat-san-pham/{slug}/{qty}",[
        "uses"=>"CartController@update_Cart",
        "as"=>"public.flowers.update"
            ]);
});

//---------------liên hệ-------------------
Route::get("lien-he",[
    "uses"=>"ContactsController@getContacts",
    "as"=>"public.contacts.contacts"
        ]);
Route::post("lien-he",[
    "uses"=>"ContactsController@PostContacts",
    "as"=>"public.contacts.contacts"
        ]);
//--------kết thức liên hệ---------------------
//--------quên mật khẩu-----
Route::get("quen-mat-khau",[
    "uses"=>"LoginController@getForgetPassword",
    "as"=>"public.login.forgetPassword"
        ]);
Route::post("quen-mat-khau",[
    "uses"=>"LoginController@postForgetPassword",
    "as"=>"public.login.forgetPassword"
        ]);
//-------------------


//-------------đăng ký---------------
Route::get("dang-ky",[
    "uses"=>"LoginController@login",
    "as"=>"public.login.login"
        ]);
Route::post("dang-ky",[
    "uses"=>"LoginController@postLogin",
    "as"=>"public.login.login"
        ]);
Route::get("dang-ky-thong-tin",[
    "uses"=>"LoginController@register",
    "as"=>"public.login.register"
        ]);
Route::post("dang-ky-thong-tin",[
    "uses"=>"Admin\UsersController@postAdd_Public",
    "as"=>"public.login.register"
        ]);
//-----kết thúc đăng ký------



//----lấy thông tin khi khách hàng mua hàng ko cần đăng ký---
Route::get("thong-tin",[
    "uses"=>"LoginController@guest",
    "as"=>"public.login.guest"
        ]);

Route::post("thong-tin-thanh-toan-guest",[
    "uses"=>"LoginController@guestInfo",
    "as"=>"public.payInfo_guest"
        ]);

///kết thúc-----------------



//----Thanh toán------------------
Route::post("dat-hang",[
    "uses"=>"PayController@order",
    "as"=>"public.pay.order"
        ]);
Route::get("thong-tin-thanh-toan",[
    "uses"=>"PayController@payInfo",
    "as"=>"public.pay.payInfo"
        ]);
Route::post("thong-tin-thanh-toan",[
    "uses"=>"PayController@payInfo",
    "as"=>"public.pay.payInfo"
        ]);
Route::post("xac-nhan-thanh-toan",[
    "uses"=>"PayController@payConfirm",
    "as"=>"public.pay.payConfirm"
        ]);

Route::get("thanh-toan",[
    "uses"=>"PayController@formatPay",
    "as"=>"public.pay.format"
        ]);
Route::get("hoan-thanh-thanh-toan",[
    "uses"=>"PayController@payComplate",
    "as"=>"public.pay.payComplate"
        ]);

//---------------kết thúc thanh toán-------
//---thanh toan cho khách không đăng ký----
Route::post("xac-nhan-thanh-toan-guest-{id}",[
    "uses"=>"PayController@payConfirm_guest",
    "as"=>"public.pay.payConfirm_guest"
        ]);
Route::post("dat-hang-guest-{id}",[
    "uses"=>"PayController@order_guest",
    "as"=>"public.pay.order_guest"
        ]);
////kết thúc



Route::get("gioi-thieu",[
    "uses"=>"IndexController@aboutus",
    "as"=>"public.index.aboutus"
        ]);


//-------END PUBLIC------------



//-------ADMIN--------------
Route::group(['namespace'=>'Admin','prefix' => 'admin', 'middleware'=>'auth'], function () {
    Route::get("/",[
    "uses"=>"IndexController@index",
    "as"=>"admin.index.index"
        ])->middleware('role: Admin | Mod');
    Route::group(['prefix' => 'flowers','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"FlowersController@flowers",
            "as"=>"admin.flowers.flowers"
        ]);
        //---------
        Route::get("search",[
            "uses"=>"FlowersController@search",
            "as"=>"admin.flowers.search"
        ]);
        //--------
        Route::get("{id}",[
            "uses"=>"FlowersController@flowers_cats",
            "as"=>"admin.flowers.flowers_cats"
        ]);
        Route::get("add",[
            "uses"=>"FlowersController@getAdd",
            "as"=>"admin.flowers.add"
        ])->middleware('role: Admin | Mod');
        Route::post("add",[
            "uses"=>"FlowersController@postAdd",
            "as"=>"admin.flowers.add"
        ]);
        Route::get("del-{id}",[
            "uses"=>"FlowersController@del",
            "as"=>"admin.flowers.del"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"FlowersController@getEdit",
            "as"=>"admin.flowers.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"FlowersController@postEdit",
            "as"=>"admin.flowers.edit"
        ]);
    });
    Route::group(['prefix' => 'cats','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"CatsController@cats",
            "as"=>"admin.cats.cats"
        ]);
        Route::get("del-{id}",[
            "uses"=>"CatsController@del",
            "as"=>"admin.cats.del"
        ]);

        Route::get("add",[
            "uses"=>"CatsController@getAdd",
            "as"=>"admin.cats.add"
        ]);
        Route::post("add",[
            "uses"=>"CatsController@postAdd",
            "as"=>"admin.cats.add"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"CatsController@getEdit",
            "as"=>"admin.cats.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"CatsController@postEdit",
            "as"=>"admin.cats.edit"
        ]);
    });
    Route::group(['prefix' => 'advs','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"AdvsController@advs",
            "as"=>"admin.advs.advs"
        ]);
        Route::get("del-{id}",[
            "uses"=>"AdvsController@del",
            "as"=>"admin.advs.del"
        ]);

        Route::get("add",[
            "uses"=>"AdvsController@getAdd",
            "as"=>"admin.advs.add"
        ]);
        Route::post("add",[
            "uses"=>"AdvsController@postAdd",
            "as"=>"admin.advs.add"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"AdvsController@getEdit",
            "as"=>"admin.advs.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"AdvsController@postEdit",
            "as"=>"admin.advs.edit"
        ]);
    });
    Route::group(['prefix' => 'contacts','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"ContactsController@contacts",
            "as"=>"admin.contacts.contacts"
        ]);
        Route::get("del-{id}",[
            "uses"=>"ContactsController@del",
            "as"=>"admin.contacts.del"
        ]);
    });
    Route::group(['prefix' => 'aboutus','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"AboutUsController@aboutus",
            "as"=>"admin.aboutus.aboutus"
        ]);
        Route::get("del-{id}",[
            "uses"=>"AboutUsController@del",
            "as"=>"admin.aboutus.del"
        ]);
        Route::get("add",[
            "uses"=>"AboutUsController@getAdd",
            "as"=>"admin.aboutus.add"
        ]);
        Route::post("add",[
            "uses"=>"AboutUsController@postAdd",
            "as"=>"admin.aboutus.add"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"AboutUsController@getEdit",
            "as"=>"admin.aboutus.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"AboutUsController@postEdit",
            "as"=>"admin.aboutus.edit"
        ]);
    });
     Route::group(['prefix' => 'orders','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"OrdersController@orders",
            "as"=>"admin.orders.orders"
        ]);
        Route::get("del-{id}",[
            "uses"=>"OrdersController@del",
            "as"=>"admin.orders.del"
        ]);
        Route::get("detail-{id}",[
            "uses"=>"Order_detailController@Order_detail",
            "as"=>"admin.orders.order_detail"
        ]);
        Route::get("kich-hoat",[
            "uses"=>"OrdersController@update_status",
            "as"=>"admin.orders.update"
        ]);


        
    });
     Route::group(['prefix' => 'pays','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"PaysController@pays",
            "as"=>"admin.pays.pays"
        ]);
        Route::get("del-{id}",[
            "uses"=>"PaysController@del",
            "as"=>"admin.pays.del"
        ]);

        Route::get("add",[
            "uses"=>"PaysController@getAdd",
            "as"=>"admin.pays.add"
        ]);
        Route::post("add",[
            "uses"=>"PaysController@postAdd",
            "as"=>"admin.pays.add"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"PaysController@getEdit",
            "as"=>"admin.pays.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"PaysController@postEdit",
            "as"=>"admin.pays.edit"
        ]);
    });
    Route::group(['prefix' => 'type','middleware'=>'role: Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"TypeController@type",
            "as"=>"admin.type.type"
        ]);
        Route::get("del-{id}",[
            "uses"=>"TypeController@del",
            "as"=>"admin.type.del"
        ]);
        Route::get("delall",[
            "uses"=>"TypeController@delAll",
            "as"=>"admin.type.delall"
        ]);

        Route::get("add",[
            "uses"=>"TypeController@getAdd",
            "as"=>"admin.type.add"
        ]);
        Route::post("add",[
            "uses"=>"TypeController@postAdd",
            "as"=>"admin.type.add"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"TypeController@getEdit",
            "as"=>"admin.type.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"TypeController@postEdit",
            "as"=>"admin.type.edit"
        ]);
    });
    Route::group(['prefix' => 'users','middleware'=>'role:Admin | Mod'], function () {
        Route::get("",[
            "uses"=>"UsersController@users",
            "as"=>"admin.users.users"
        ]);
        Route::get("add",[
            "uses"=>"UsersController@getAdd",
            "as"=>"admin.users.add"
        ]);
        Route::post("add",[
            "uses"=>"UsersController@postAdd",
            "as"=>"admin.users.add"
        ]);
        Route::get("del-{id}",[
            "uses"=>"UsersController@del",
            "as"=>"admin.users.del"
        ]);
        Route::get("edit-{id}",[
            "uses"=>"UsersController@getEdit",
            "as"=>"admin.users.edit"
        ]);
        Route::post("edit-{id}",[
            "uses"=>"UsersController@postEdit",
            "as"=>"admin.users.edit"
        ]);
        
    });

});
//-------END ADMIN------------




//--------LOGIN------------
Route::group(['namespace'=>'Auth','prefix' => 'auth'], function () {
    Route::get("login",[
            "uses"=>"AuthController@getLogin",
            "as"=>"admin.auth.login"
        ]);
    Route::post("login",[
            "uses"=>"AuthController@postLogin",
            "as"=>"admin.auth.login"
        ]);
    Route::get("logout",[
            "uses"=>"AuthController@logout",
            "as"=>"admin.auth.logout"
        ]);
    Route::get("error",[
            "uses"=>"AuthController@error",
            "as"=>"admin.auth.error"
        ]);
});
//---END LOGIN----------------------
//------AJAX--------------
  Route::post("/ajax/update-status",[
    "uses"=>"AjaxController@postUpdateStatus",
    "as"=>"orders.update_status"
    ]);
  Route::post("/ajax/update-active",[
    "uses"=>"AjaxController@postUpdateActive",
    "as"=>"orders.update_active"
    ]);
  Route::post("/ajax/update-ship",[
    "uses"=>"AjaxController@postUpdateShip",
    "as"=>"orders.update_ship"
    ]);
  ////--------------MAIL------------
  Route::get("mail",[
            "uses"=>"MailController@getMail",
            "as"=>"admin.mail.mail"
        ]);
   Route::post("mail",[
            "uses"=>"Admin\IndexController@postMail",
            "as"=>"admin.mail.mail"
        ]);
   // Route::any('{all?}', function(){
   //  return redirect('/');
   // });