<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domains')->insert([
            [
                'title' => 'Азербайджан',
                'slug' => 'az',
            ],
            [
                'title' => 'Узбекистан',
                'slug' => 'uz',
            ],
            [
                'title' => 'Кыргызстан',
                'slug' => 'kg',
            ],
            [
                'title' => 'Грузия',
                'slug' => 'ge',
            ],
        ]);
    }
}
