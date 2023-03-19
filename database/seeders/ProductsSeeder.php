<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $options = [
            ['name' => 'product1','barcode'=>'#prd1','short_description'=>'this is prd1','long_description'=>'this is product 1','price'=>'1000.99','quantity'=>'1','image'=>'images/1.jpg','category_id'=>'1'],
            ['name' => 'product2','barcode'=>'#prd2','short_description'=>'this is prd2','long_description'=>'this is product 2','price'=>'2000.99','quantity'=>'2','image'=>'images/2.jpg','category_id'=>'2'],
            ['name' => 'product3','barcode'=>'#prd3','short_description'=>'this is prd3','long_description'=>'this is product 3','price'=>'300.99','quantity'=>'3','image'=>'images/3.jpg','category_id'=>'3'],
            ['name' => 'product4','barcode'=>'#prd4','short_description'=>'this is prd4','long_description'=>'this is product 4','price'=>'40.99','quantity'=>'4','image'=>'images/4.jpg','category_id'=>'1'],
            ['name' => 'product5','barcode'=>'#prd5','short_description'=>'this is prd5','long_description'=>'this is product 5','price'=>'50.99','quantity'=>'5','image'=>'images/5.png','category_id'=>'1'],
        ];

        DB::table('products')->insert($options);
    }
}
