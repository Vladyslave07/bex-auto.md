<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Alfa Romeo","ru":"Alfa Romeo","en":"Alfa Romeo"}',
                'slug' => 'alfa-romeo',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Aston Martin","ru":"Aston Martin","en":"Aston Martin"}',
                'slug' => 'aston-martin',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi","ru":"Audi","en":"Audi"}',
                'slug' => 'audi',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bentley","ru":"Bentley","en":"Bentley"}',
                'slug' => 'bentley',
            ],
        ]);
    }
}
