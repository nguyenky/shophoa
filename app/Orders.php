<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getOrders(){
    	return DB::table('orders as o')
    				->leftjoin('users as u','u.id','=','o.user_id')
                    ->leftjoin('pays as p','o.payment_info','=','p.id')			
    				->select('*','o.id as oid','u.id as uid','p.id as pid','o.created_at as ocreated_at')
    				->orderBy('o.id','DESC')
    				->paginate(10);

    }
}

