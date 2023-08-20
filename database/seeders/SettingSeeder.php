<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('web_settings')->insert([
            'app_short_name' => 'Sunrise Khabar',
            'app_full_name' => 'Sunrise Khabar',
        ]);
    }
}
