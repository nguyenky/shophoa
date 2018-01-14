<?php

use Illuminate\Database\Seeder;
use App\Tags;
class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tags::truncate();
        $tags = ['New','Sale Off','-50%','Hot','Common'];
        foreach ($tags as $key => $value) {
        	Tags::create([
        		'name' => $value,
        		'new_price' => rand(1,50),
                'slug_name' => 'slug_name_'.$key
        	]);
        }
    }
}
