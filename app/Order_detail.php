<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order_detail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getOrder_detail($id){
    	return DB::table('order_detail as od')
    				->join('products as pro','od.product_id','=','pro.id')
    				->select('*','od.id as odid','pro.id as proid')
    				->where('order_id','=',$id)
    				->get();

    }
}
