<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $options = [
            ['option' => 'slider','value'=> '4,5,3'],
            ['option' => 'special_offer','value'=> '1,2'],
            ['option' => 'brands','value'=> '1,2'],
            ['option' => 'most_view','value'=> '1,2'],
            ['option' => 'just_arrive','value'=> '3,4,5'],
        ];

        DB::table('settings')->insert($options);
    }
}
