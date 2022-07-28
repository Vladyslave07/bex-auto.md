<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopularRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'active' => '1',
                'sort' => '500',
                'slug' => '{"uk":"gibryd","ru":"hybryd","en":"hybryd"}',
                'title' => '{"uk":"\u0413\u0456\u0431\u0440\u0438\u0434","ru":"\u0413\u0438\u0431\u0440\u0438\u0434","en":"Hybrid"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041a\u0440\u043e\u0441\u043e\u0432\u0435\u0440 \/ \u041f\u043e\u0437\u0430\u0448\u043b\u044f\u0445\u043e\u0432\u0438\u043a","ru":"\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u0435\u0440 \/ \u0412\u043d\u0435\u0434\u043e\u0440\u043e\u0436\u043d\u0438\u043a","en":"Crossover \/ SUV"}',
                'slug' => '{"uk":"crossover","ru":"crossover","en":"crossover"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041c\u0456\u043d\u0456\u0432\u0435\u043d","ru":"\u041c\u0438\u043d\u0438\u0432\u044d\u043d","en":"Minivan"}',
                'slug' => '{"uk":"miniven","ru":"miniven","en":"minivan"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u0421\u0435\u0434\u0430\u043d","ru":"\u0421\u0435\u0434\u0430\u043d","en":"Sedan"}',
                'slug' => '{"uk":"sedan","ru":"sedan","en":"sedan"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u0423\u043d\u0456\u0432\u0435\u0440\u0441\u0430\u043b","ru":"\u0423\u043d\u0438\u0432\u0435\u0440\u0441\u0430\u043b","en":"Station-wagon"}',
                'slug' => '{"uk":"universal","ru":"universal","en":"station-wagon"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u0415\u043b\u0435\u043a\u0442\u0440\u043e\u043c\u043e\u0431\u0456\u043b\u044c","ru":"\u042d\u043b\u0435\u043a\u0442\u0440\u043e\u043c\u043e\u0431\u0438\u043b\u044c","en":"Electrocars"}',
                'slug' => '{"uk":"electrocars","ru":"electrocars","en":"electrocars"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u0425\u0435\u0442\u0447\u0431\u0435\u043a","ru":"\u0425\u0435\u0442\u0447\u0431\u0435\u043a","en":"HetchBack"}',
                'slug' => '{"uk":"hetchback","ru":"hetchback","en":"hetchback"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041f\u0456\u043a\u0430\u043f","ru":"\u041f\u0438\u043a\u0430\u043f","en":"Picup"}',
                'slug' => '{"uk":"picup","ru":"picup","en":"picup"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041a\u0430\u0431\u0440\u0456\u043e\u043b\u0435\u0442","ru":"\u041a\u0430\u0431\u0440\u0438\u043e\u043b\u0435\u0442","en":"\u0421onvertible"}',
                'slug' => '{"uk":"kabriolet","ru":"kabriolet","en":"convertible"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041a\u0440\u0443\u0456\u0437\u0435\u0440","ru":"\u041a\u0440\u0443\u0438\u0437\u0435\u0440","en":"Cruiser"}',
                'slug' => '{"uk":"kruizer","ru":"kruizer","en":"cruiser"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041a\u0443\u043f\u0435","ru":"\u041a\u0443\u043f\u0435","en":"Coupe"}',
                'slug' => '{"uk":"kupe","ru":"kupe","en":"coupe"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041d\u0430\u0432\u0430\u043d\u0442\u0430\u0436\u0443\u0432\u0430\u0447","ru":"\u041f\u043e\u0433\u0440\u0443\u0437\u0447\u0438\u043a","en":"Loader"}',
                'slug' => '{"uk":"navantazhuvach","ru":"pogruzchik","en":"loader"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u0424\u0443\u0440\u0433\u043e\u043d","ru":"\u0424\u0443\u0440\u0433\u043e\u043d","en":"Van"}',
                'slug' => '{"uk":"furgon","ru":"furgon","en":"van"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u041c\u043e\u0442\u043e\u0446\u0438\u043a\u043b","ru":"\u041c\u043e\u0442\u043e\u0446\u0438\u043a\u043b","en":"Motorcycle"}',
                'slug' => '{"uk":"motocikly","ru":"motocikly","en":"motorcycle"}',
            ],
        ]);
    }
}
