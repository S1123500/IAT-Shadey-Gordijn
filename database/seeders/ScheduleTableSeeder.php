<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule')->insert([
            'curtain name' => 'Betty', 
            'which day' => 'Mon', 
            'what time' => '17:49:00',
            'percentage' => 3]);
    }
}
