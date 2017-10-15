<?php

use Illuminate\Database\Seeder;
use App\Brand;
class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        $brands = ['Luxurious','Classic','Model','Hot Trend','Simple','Fussy','Monster','Sport','Summer','UFO'];
        foreach ($brands as $key => $value) {
        	Brand::create([
        		'name'=>$value,
        	]);
        }
    }
}
