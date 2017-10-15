<?php
namespace App;
use Eloquent as Model;
class Tags extends Model
{
    public $table = 'tags';
    public $fillable = [
        'name',
        'new_price',
    ];
    protected $casts = [
        'name' => 'string',
        'new_price' => 'integer',
    ];
    public $timestamps = false;
    // public function has_products(){
    //     return $this->hasMany(\App\Products::class,'brand_id');
    // }
    // public function count_brands(){
    //     $brands = $this->all();
    //     foreach ($brands as $key => $value) {
    //         $value['count'] = $value->has_products()->count();
    //     }
    //     return $brands->toArray();
    // }
}