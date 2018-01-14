<?php
namespace App;
use Eloquent as Model;
class Products extends Model
{
    public $table = 'products';
    public $fillable = [
        'name',
        'category_id',
        'price',
        'tag_id',
        'created_by',
        'picture',
        'preview',
        'brand_id',
        'slide',
    ];
    protected $casts = [
        'name' => 'string',
        'category_id' => 'integer',
        'price' => 'integer',
        'tag_id' => 'integer',
        'created_by' => 'integer',
        'picture' => 'string',
        'preview' => 'string',
        'brand_id' => 'integer',
        'slide' => 'boolean',
    ];
    public function slide(){
        $slide = $this->where('slide',true)->get();
        return $slide->toArray();
    }
}