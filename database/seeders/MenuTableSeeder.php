<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
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
                'slug' => 'catalog',
                'title' => '{"ru":"\u041a\u0430\u0442\u0430\u043b\u043e\u0433","uk":"\u041a\u0430\u0442\u0430\u043b\u043e\u0433","en":"Catalog"}',
                'items' => '{"uk":[{"name":"\u0410\u0432\u0442\u043e \u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0410\u0432\u0442\u043e \u0437 \u041a\u043e\u0440\u0435\u0457","url":"#"},{"name":" \u0415\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u0438","url":"#"},{"name":"\u041d\u043e\u0432\u0456 \u0435\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u0438 ","url":"#"},{"name":"\u041c\u043e\u0442\u043e\u0446\u0438\u043a\u043b\u0438 \u0437 \u0421\u0428\u0410 ","url":"#"},{"name":"\u041d\u0430\u0432\u0430\u043d\u0442\u0430\u0436\u0443\u0432\u0430\u0447\u0456 ","url":"#"},{"name":"\u0414\u0456\u043b\u0435\u0440\u0441\u044c\u043a\u0456 \u043f\u043e\u0441\u043b\u0443\u0433\u0438","url":"#"}],"ru":[{"name":"\u0410\u0432\u0442\u043e \u0438\u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0410\u0432\u0442\u043e \u0438\u0437 \u041a\u043e\u0440\u0435\u0438","url":"#"},{"name":"\u042d\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u044b","url":"#"},{"name":"\u041d\u043e\u0432\u044b\u0435 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043a\u0430\u0440\u044b","url":"#"},{"name":"\u041c\u043e\u0442\u043e\u0446\u0438\u043a\u043b\u044b \u0438\u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u041f\u043e\u0433\u0440\u0443\u0437\u0447\u0438\u043a\u0438","url":"#"},{"name":"\u0414\u0438\u043b\u0435\u0440\u0441\u043a\u0438\u0435 \u0443\u0441\u043b\u0443\u0433\u0438","url":"#"}],"en":[{"name":"Cars from the USA","url":"#"},{"name":"Car from Korea","url":"#"},{"name":"Electric cars","url":"#"},{"name":"New electric cars","url":"#"},{"name":"Motorcycles from the USA","url":"#"},{"name":"Loaders","url":"#"},{"name":"Dealer services","url":"#"}]}',
            ],
            [
                'active' => '1',
                'slug' => 'service',
                'title' => '{"ru":"\u0423\u0441\u043b\u0443\u0433\u0438","uk":"\u041f\u043e\u0441\u043b\u0443\u0433\u0438","en":"Service"}',
                'items' => '{"uk":[{"name":"\u0414\u043e\u0441\u0442\u0430\u0432\u043a\u0430 \u0430\u0432\u0442\u043e \u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u041c\u0438\u0442\u043d\u0435 \u043e\u0444\u043e\u0440\u043c\u043b\u0435\u043d\u043d\u044f \u0430\u0432\u0442\u043e \u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u041f\u0456\u0434\u0431\u0456\u0440 \u0437\u0430\u043f\u0447\u0430\u0441\u0442\u0438\u043d \u0442\u0430 \u0440\u0435\u043c\u043e\u043d\u0442 \u0430\u0432\u0442\u043e\u043c\u043e\u0431\u0456\u043b\u044f \u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0421\u0435\u0440\u0442\u0438\u0444\u0456\u043a\u0430\u0446\u0456\u044f \u0456 \u043f\u043e\u0441\u0442\u0430\u043d\u043e\u0432\u043a\u0430 \u043d\u0430 \u043e\u0431\u043b\u0456\u043a \u0430\u0432\u0442\u043e \u0437 \u0421\u0428\u0410","url":"#"}],"ru":[{"name":"\u0414\u043e\u0441\u0442\u0430\u0432\u043a\u0430 \u0430\u0432\u0442\u043e \u0438\u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0422\u0430\u043c\u043e\u0436\u0435\u043d\u043d\u043e\u0435 \u043e\u0444\u043e\u0440\u043c\u043b\u0435\u043d\u0438\u0435 \u0430\u0432\u0442\u043e \u0438\u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u041f\u043e\u0434\u0431\u043e\u0440 \u0437\u0430\u043f\u0447\u0430\u0441\u0442\u0435\u0439 \u0438 \u0440\u0435\u043c\u043e\u043d\u0442 \u0430\u0432\u0442\u043e\u043c\u043e\u0431\u0438\u043b\u044f \u0438\u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0421\u0435\u0440\u0442\u0438\u0444\u0438\u043a\u0430\u0446\u0438\u044f \u0438 \u043f\u043e\u0441\u0442\u0430\u043d\u043e\u0432\u043a\u0430 \u043d\u0430 \u0443\u0447\u0435\u0442 \u0430\u0432\u0442\u043e\u043c\u043e\u0431\u0438\u043b\u0435\u0439 \u0438\u0437 \u0421\u0428\u0410","url":"#"}],"en":[{"name":"Car delivery from the USA","url":"#"},{"name":"Customs clearance of cars from the USA","url":"#"},{"name":"Selection of spare parts and car repairs from the USA","url":"#"},{"name":"Certification and registration of cars from the USA","url":"#"}]}',
            ],
            [
                'active' => '1',
                'slug' => 'sold-car',
                'title' => '{"ru":"\u041f\u0440\u043e\u0434\u0430\u0442\u044c \u0430\u0432\u0442\u043e\u043c\u043e\u0431\u0438\u043b\u044c","uk":"\u041f\u0440\u043e\u0434\u0430\u0442\u0438 \u0430\u0432\u0442\u043e","en":"Sell car"}',
                'items' => '{"en":null}',
            ],
            [
                'active' => '1',
                'slug' => 'calculator',
                'title' => '{"ru":"\u041a\u0430\u043b\u044c\u043a\u0443\u043b\u044f\u0442\u043e\u0440","uk":"\u041a\u0430\u043b\u044c\u043a\u0443\u043b\u044f\u0442\u043e\u0440","en":"Calculator"}',
                'items' => '{"uk":[{"name":"\u0420\u043e\u0437\u0440\u0430\u0445\u0443\u043d\u043e\u043a \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e \u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0420\u043e\u0437\u0440\u0430\u0445\u0443\u043d\u043e\u043a \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e \u0437 \u041a\u043e\u0440\u0435\u0457","url":"#"}],"ru":[{"name":"\u0420\u0430\u0441\u0447\u0435\u0442 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e \u0438\u0437 \u0421\u0428\u0410","url":"#"},{"name":"\u0420\u0430\u0441\u0447\u0435\u0442 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e \u0438\u0437 \u041a\u043e\u0440\u0435\u0438","url":"#"}],"en":[{"name":"Calculation of delivery of a car from the USA","url":"#"},{"name":"Calculation of car delivery from Korea","url":"#"}]}',
            ],
            [
                'active' => '1',
                'slug' => 'about',
                'title' => '{"ru":"\u041f\u0440\u043e \u043a\u043e\u043c\u043f\u0430\u043d\u0456\u044e","uk":"\u041f\u0440\u043e \u043a\u043e\u043c\u043f\u0430\u043d\u0456\u044e","en":"About company"}',
                'items' => '{"ru":[{"name":"\u041e \u043d\u0430\u0441","url":"#"},{"name":"\u041e\u0442\u0437\u044b\u0432\u044b","url":"#"},{"name":"\u0413\u0430\u0440\u0430\u043d\u0442\u0438\u0438","url":"#"},{"name":"\u041d\u043e\u0432\u043e\u0441\u0442\u0438","url":"#"}],"uk":[{"name":"\u041f\u0440\u043e \u043d\u0430\u0441","url":"#"},{"name":"\u0412\u0456\u0434\u0433\u0443\u043a\u0438","url":"#"},{"name":"\u0413\u0430\u0440\u0430\u043d\u0442\u0456\u0457","url":"#"},{"name":"\u041d\u043e\u0432\u0438\u043d\u0438","url":"#"}],"en":[{"name":"About us","url":"#"},{"name":"Reviews","url":"#"},{"name":"Guarantees","url":"#"},{"name":"News","url":"#"}]}',
            ],
            [
                'active' => '1',
                'slug' => 'auto-by-order',
                'title' => '{"ru":"\u0410\u0432\u0442\u043e \u043f\u043e\u0434 \u0437\u0430\u043a\u0430\u0437","uk":"\u0410\u0432\u0442\u043e \u043f\u0456\u0434 \u0437\u0430\u043c\u043e\u0432\u043b\u0435\u043d\u043d\u044f","en":"Car on order"}',
                'items' => '{"en":null}',
            ],
        ]);
    }
}
