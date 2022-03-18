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
            'curtain-name' => 'Betty', 
            'which-day' => 'Mon', 
            'what-time' => '17:49:00',
            'percentage' => 3]);
        DB::table('schedule')->insert([
            'curtain-name' => 'Betty', 
            'which-day' => 'Tue', 
            'what-time' => '08:00:00',
            'percentage' => 0]);
        DB::table('schedule')->insert([
            'curtain-name' => 'Jaap', 
            'which-day' => 'Wed', 
            'what-time' => '08:00:00',
            'percentage' => 0]);
        DB::table('schedule')->insert([
            'curtain-name' => 'Gerda', 
            'which-day' => 'Thu', 
            'what-time' => '23:00:00',
            'percentage' => 4]);
        DB::table('schedule')->insert([
            'curtain-name' => 'Frank', 
            'which-day' => 'Sun', 
            'what-time' => '06:00:00',
            'percentage' => 0]);
    }
}
