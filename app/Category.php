<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /*Relasionship*/

    public function has_categories(){
    	return $this->hasMany(\App\Category::class);
    }

    /*Funtion*/
    public function cats_parrent(){
    	$cats = $this->where('category_id',null)->get();
    	foreach ($cats as $key => $value) {
    		$value->has_categories->toArray();
    	}
    	return $cats->toArray();
    }
}