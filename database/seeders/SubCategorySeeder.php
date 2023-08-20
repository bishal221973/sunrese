<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            कैलाली',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'कञ्चनपुर ',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'डडेल्धुरा ',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            डोटी',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            अछाम',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            बैतडी',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            बाजुरा',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            बझाङ',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            दार्चुला',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => '
            अन्य',
        ]);
    }
}
