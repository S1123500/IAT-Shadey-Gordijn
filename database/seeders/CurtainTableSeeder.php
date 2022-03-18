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
        DB::table('curtain')->insert(['name' => 'Betty',
        'location' => 'Slaapkamer 1',
        'percentage' => 0]);
    }
}
