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
            'percentage' => 0,
            'pairingcode' => '111111111']);
        DB::table('curtain')->insert([
            'name' => 'Frank',
            'location' => 'Livingroom',
            'percentage' => 0,
            'pairingcode' => '222222222']);
        DB::table('curtain')->insert([
            'name' => 'Jaap',
            'location' => 'Bedroom 2',
            'percentage' => 0,
            'pairingcode' => '333333333']);
        DB::table('curtain')->insert([
            'name' => 'Gerda',
            'location' => 'Kitchen',
            'percentage' => 0,
            'pairingcode' => '444444444']);	
            
        
    }
}
