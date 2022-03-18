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
            'name' => 'Slaapkamer 1']);
        DB::table('location')->insert([
            'name' => 'Slaapkamer 2']);
        DB::table('location')->insert([
            'name' => 'Woonkamer']);
        DB::table('location')->insert([
            'name' => 'Keuken']);
    }
}
