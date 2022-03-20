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
            'timeClose' => '17:49:00',
            'percentage1' => 3]);
        DB::table('schedule')->insert([
            'curtainName' => 'Betty', 
            'whichDay' => 'Tue', 
            'timeOpen' => '08:00:00',
            'timeClose' => '20:00:00',
            'percentage1' => 0,
            'percentage2' => 4]);
        DB::table('schedule')->insert([
            'curtainName' => 'Jaap', 
            'whichDay' => 'Wed', 
            'timeOpen' => '08:00:00',
            'percentage1' => 0]);
        DB::table('schedule')->insert([
            'curtainName' => 'Gerda', 
            'whichDay' => 'Thu', 
            'timeClose' => '23:00:00',
            'percentage1' => 4]);
        DB::table('schedule')->insert([
            'curtainName' => 'Gerda', 
            'whichDay' => 'Thu', 
            'timeOpen' => '04:00:00',
            'timeClose' => '12:30:00',
            'percentage1' => 2,
            'percentage2' => 4]);
        DB::table('schedule')->insert([
            'curtainName' => 'Frank', 
            'whichDay' => 'Sun', 
            'timeOpen' => '06:00:00',
            'percentage1' => 0]);
    }
}
