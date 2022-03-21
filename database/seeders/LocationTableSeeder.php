<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location')->insert([
            'name' => 'Bedroom 1']);
        DB::table('location')->insert([
            'name' => 'Bedroom 2']);
        DB::table('location')->insert([
            'name' => 'Livingroom']);
        DB::table('location')->insert([
            'name' => 'Kitchen']);
    }
}
