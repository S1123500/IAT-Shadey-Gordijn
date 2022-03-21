<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LightsensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lightsensor')->insert([
            'location' => 'Bedroom 1',
            'value' => 2000]);
        DB::table('lightsensor')->insert([
            'location' => 'Bedroom 2',
            'value' => 4000]);
    }
}
