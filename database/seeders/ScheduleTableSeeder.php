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
            'timeOpen' => '06:00',
            'timeClose' => '17:50']);
        DB::table('schedule')->insert([
            'curtainName' => 'Betty', 
            'whichDay' => 'Tue', 
            'timeOpen' => '08:00',
            'timeClose' => '20:00']);
        DB::table('schedule')->insert([
            'curtainName' => 'Jaap', 
            'whichDay' => 'Wed', 
            'timeOpen' => '04:00',
            'timeClose' => '21:00']);
        DB::table('schedule')->insert([
            'curtainName' => 'Gerda', 
            'whichDay' => 'Thu', 
            'timeOpen' => '10:00',
            'timeClose' => '23:00']);
        DB::table('schedule')->insert([
            'curtainName' => 'Gerda', 
            'whichDay' => 'Sat', 
            'timeOpen' => '04:00',
            'timeClose' => '12:30']);
        DB::table('schedule')->insert([
            'curtainName' => 'Frank', 
            'whichDay' => 'Sun', 
            'timeOpen' => '08:30',
            'timeClose' => '21:15']);
    }
}
