<?php

use Illuminate\Database\Seeder;
use App\Products;
use Faker\Factory;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::truncate();
        $faker = Factory::create();
        for( $i =0;$i <= 2; $i++ ){
            Products::create([
                'name' => $faker->text($maxNbChars =20),
                'category_id' => rand(1,30),
                'price' => rand(10,1000),
                'tag_id' => rand(1,5),
                'created_by' => 1,
                'picture' => $faker->imageUrl($width = 268, $height=249, 'fashion', true, 'Faker', true),
                'preview' => $faker->text($maxNbChars =200),
                'brand_id' => rand(1,10),
                'slide' => true
            ]);
        }
        for( $i =0;$i <= 200; $i++ ){
        	Products::create([
        		'name' => $faker->text($maxNbChars =20),
		        'category_id' => rand(1,30),
		        'price' => rand(10,1000),
		        'tag_id' => rand(1,5),
		        'created_by' => 1,
		        'picture' => $faker->imageUrl($width = 268, $height=249, 'fashion', true, 'Faker', true),
		        'preview' => $faker->text($maxNbChars =200),
		        'brand_id' => rand(1,10),
		        'slide' => false
        	]);
        }
    }
}
