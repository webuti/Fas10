<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TeamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_types')->insert([
            'name' => 'Üretici', 
        ]);
        DB::table('team_types')->insert([
            'name' => 'Toptancı', 
        ]);
        DB::table('team_types')->insert([
            'name' => 'Girişimci', 
        ]);
    }
}
