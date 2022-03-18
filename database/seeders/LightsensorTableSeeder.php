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
            'name' => 'Slaapkamer 1',
            'value' => 2000]);
    }
}
