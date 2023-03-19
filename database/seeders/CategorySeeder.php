<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Main'],
            ['name' => 'Books'],
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Sports']
        ];


        DB::table('categories')->insert($categories);
    }
}
