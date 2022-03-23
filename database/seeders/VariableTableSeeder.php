<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class VariableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variable')->insert([
            'name' => 'isOutOfHome', 
            'value' => 'false']);
    }
}
