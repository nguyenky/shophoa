<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Flowers extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getFlowers_cats($id){
    	 return DB::table('products as f')
                    ->join('cats as c','f.cats_id','=','c.id')
                    ->leftjoin('type as t','f.type','=','t.id')
                    ->select('*','f.id as fid','c.id as cid','f.name as fname','c.name as cname','t.name as tname')
                    ->where('f.cats_id','=',$id)
                    ->orderBy('f.id','DESC')
                    ->paginate(10);
    }
    public function getFlowers_cats_mod($id,$id_current){
         return DB::table('products as f')
                    ->join('cats as c','f.cats_id','=','c.id')
                    ->leftjoin('type as t','f.type','=','t.id')
                    ->select('*','f.id as fid','c.id as cid','f.name as fname','c.name as cname','t.name as tname')
                    ->where('f.cats_id','=',$id)
                    ->where('created_by','=',$id_current)
                    ->orderBy('f.id','DESC')
                    ->paginate(10);
    }
    public function getFlowers(){
    	return DB::table('products as f')
    				->join('cats as c','f.cats_id','=','c.id')
                    ->leftjoin('type as t','f.type','=','t.id')
    				->select('*','f.id as fid','c.id as cid','f.name as fname','c.name as cname','t.name as tname')
    				->orderBy('f.id','DESC')
    				->paginate(10);

    }
    public function getFlowers_mod($id){
        return DB::table('products as f')
                    ->join('cats as c','f.cats_id','=','c.id')
                    ->leftjoin('type as t','f.type','=','t.id')
                    ->select('*','f.id as fid','c.id as cid','f.name as fname','c.name as cname','t.name as tname')
                    ->where('created_by','=',$id)
                    ->orderBy('f.id','DESC')
                    ->paginate(10);

    }
    //---TÌM KIẾM ----
     public function getFlowers_search($search){
        return DB::table('products as f')
                    ->join('cats as c','f.cats_id','=','c.id')
                    ->leftjoin('type as t','f.type','=','t.id')
                    ->select('*','f.id as fid','c.id as cid','f.name as fname','c.name as cname','t.name as tname')
                    ->where("f.name","like","%$search%")
                    ->orderBy('f.id','DESC')
                    ->paginate(2);

    }
    public function getFlowers_mod_search($id,$search){
        return DB::table('products as f')
                    ->join('cats as c','f.cats_id','=','c.id')
                    ->leftjoin('type as t','f.type','=','t.id')
                    ->select('*','f.id as fid','c.id as cid','f.name as fname','c.name as cname','t.name as tname')
                    ->where('created_by','=',$id)
                    ->where("f.name","like","%$search%")
                    ->orderBy('f.id','DESC')
                    ->paginate(2);

    }
}
