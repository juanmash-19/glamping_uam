<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabinLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabin_levels')->insert([
            'name' => "VIP",
            'color' => "ff0000",
            'description' => "Cabañas para gente muy importante",
        ]);

        DB::table('cabin_levels')->insert([
            'name' => "Básica",
            'color' => "0f0f0f",
            'description' => "Cabañas para gente normal",
        ]);

    }
}