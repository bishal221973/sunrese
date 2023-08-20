<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category' => 'News',
            'name'=>'समाचार',
        ]);
        DB::table('categories')->insert([
            'category' => 'Province',
            'name'=>'प्रदेश',
        ]);
        DB::table('categories')->insert([
            'category' => 'Interview',
            'name'=>'अन्तर्वार्ता',
        ]);
        DB::table('categories')->insert([
            'category' => 'Blog',
            'name'=>'विचार',
        ]);
        DB::table('categories')->insert([
            'category' => 'Agriculture',
            'name'=>'कृषि',
        ]);
        DB::table('categories')->insert([
            'category' => 'Feature',
            'name'=>'फिचर',
        ]);
        DB::table('categories')->insert([
            'category' => 'Health',
            'name'=>'स्वास्थ्य',
        ]);
        DB::table('categories')->insert([
            'category' => 'Saptaranga',
            'name'=>'कला साहित्य',
        ]);
        DB::table('categories')->insert([
            'category' => 'International',
            'name'=>'अन्तर्राष्ट्रिय',
        ]);
        DB::table('categories')->insert([
            'category' => 'Sports',
            'name'=>'खेलकुद',
        ]);
        DB::table('categories')->insert([
            'category' => 'रोचक',
            'name'=>'रोचक',
        ]);
    }
}
