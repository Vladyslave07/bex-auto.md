<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => '{"uk":"\u0410\u0432\u0442\u043e \u0437 \u0421\u0428\u0410","ru":"\u0410\u0432\u0442\u043e \u0438\u0437 \u0421\u0428\u0410","en":"Cars from the USA"}',
                'slug' => 'avto-iz-ssha',
                'active' => '1',
                'sort' => 500,
                'show_in_slider' => '1',
            ],
            [
                'title' => '{"uk":"\u0410\u0432\u0442\u043e \u0437 \u041a\u043e\u0440\u0435\u0457","ru":"\u0410\u0432\u0442\u043e \u0438\u0437 \u041a\u043e\u0440\u0435\u0438","en":"Car from Korea"}',
                'slug' => 'avto-iz-korei',
                'active' => '1',
                'sort' => 500,
                'show_in_slider' => '1',
            ],
            [
                'title' => '{"uk":"\u0415\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u0438","ru":"\u042d\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u044b","en":"Electric cars"}',
                'slug' => 'elektromobili',
                'active' => '1',
                'sort' => 500,
                'show_in_slider' => '0',
            ],
            [
                'title' => '{"uk":"\u041d\u043e\u0432\u0456 \u0435\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u0438","ru":"\u041d\u043e\u0432\u044b\u0435 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u044b","en":"New electric cars"}',
                'slug' => 'novye-elektromobili',
                'active' => '1',
                'sort' => 500,
                'show_in_slider' => '1',
            ],
            [
                'title' => '{"uk":"\u041c\u043e\u0442\u043e\u0446\u0438\u043a\u043b\u0438 \u0437 \u0421\u0428\u0410","ru":"\u041c\u043e\u0442\u043e\u0446\u0438\u043a\u043b\u044b \u0438\u0437 \u0421\u0428\u0410","en":"Motorcycles from the USA"}',
                'slug' => 'motocikly',
                'active' => '1',
                'sort' => 500,
                'show_in_slider' => '0',
            ],
            [
                'title' => '{"uk":"\u041d\u0430\u0432\u0430\u043d\u0442\u0430\u0436\u0443\u0432\u0430\u0447\u0456","ru":"\u041f\u043e\u0433\u0440\u0443\u0437\u0447\u0438\u043a\u0438","en":"Loaders"}',
                'slug' => 'pogruzchiki',
                'active' => '1',
                'sort' => 500,
                'show_in_slider' => '0',
            ]
        ]);
    }
}
