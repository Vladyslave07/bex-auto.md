<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parser_info')->insert([
            [
                'slug' => 'lots_url',
            ],
            [
                'slug' => 'detail_url',
            ],
            [
                'slug' => 'token',
            ],
            [
                'slug' => 'category',
            ],
        ]);
    }
}
