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
            'curtainName' => 'Betty', 
            'whichDay' => 'Mon', 
            'whatTime' => '17:49:00',
            'percentage' => 3]);
        DB::table('schedule')->insert([
            'curtainName' => 'Betty', 
            'whichDay' => 'Tue', 
            'whatTime' => '08:00:00',
            'percentage' => 0]);
        DB::table('schedule')->insert([
            'curtainName' => 'Jaap', 
            'whichDay' => 'Wed', 
            'whatTime' => '08:00:00',
            'percentage' => 0]);
        DB::table('schedule')->insert([
            'curtainName' => 'Gerda', 
            'whichDay' => 'Thu', 
            'whatTime' => '23:00:00',
            'percentage' => 4]);
        DB::table('schedule')->insert([
            'curtainName' => 'Frank', 
            'whichDay' => 'Sun', 
            'whatTime' => '06:00:00',
            'percentage' => 0]);
    }
}
