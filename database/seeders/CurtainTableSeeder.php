<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CurtainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curtain')->insert([
            'name' => 'Betty',
            'location' => 'Bedroom 1',
            'percentage' => 0]);
        DB::table('curtain')->insert([
            'name' => 'Frank',
            'location' => 'Livingroom',
            'percentage' => 1]);
        DB::table('curtain')->insert([
            'name' => 'Jaap',
            'location' => 'Bedroom 2',
            'percentage' => 2]);
        DB::table('curtain')->insert([
            'name' => 'Gerda',
            'location' => 'Kitchen',
            'percentage' => 4]);
            
        
    }
}
