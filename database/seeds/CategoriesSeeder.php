<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Factory::create();
    	Category::truncate();
    	$cateLists = ['Sportswear','Mens','Womens','Kids','Fashion','Households','Interiors','Clothing','Bags','Shoes'];
    	foreach ($cateLists as $key => $value) {
    		$cat = Category::create([
    				'name'=> $value,
    			]);
    	}
    	$list_sportswear = ['Nike','Under Armour','Adidas','Puma','Asics'];
    	foreach ($list_sportswear as $key => $value) {
    		$cat = Category::create([
    				'name'=> $value,
    				'category_id'=> 1
    			]);
    	}
    	$list_mens=['Fendi','Guess','Valentino','Dior','Versace','Armani','Prada','Dolce And Gabbana','Chanel','Gucci'];
    	foreach ($list_mens as $key => $value) {
    		$cat = Category::create([
    				'name'=> $value,
    				'category_id'=> 2
    			]);
    	}
    	$list_womens = ['Womens Fende','Womens Guess','Valentino','Womens Dior','Verace'];
    	foreach ($list_womens as $key => $value) {
    		$cat = Category::create([
    				'name'=> $value,
    				'category_id'=> 3
    			]);
    	}

    }
}
