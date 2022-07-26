<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"\u0410\u0432\u0442\u043e\u043c\u043e\u0431\u0456\u043b\u0456","ru":"\u0410\u0432\u0442\u043e\u043c\u043e\u0431\u0438\u043b\u0438","en":"Cars"}',
                'subtitle' => '{"uk":"<p>\u0437 \u0431\u0443\u0434\u044c-\u044f\u043a\u043e\u0433\u043e \u043a\u043e\u043d\u0442\u0438\u043d\u0435\u043d\u0442\u0443, <br> \u0432 \u043d\u0430\u044f\u0432\u043d\u043e\u0441\u0442\u0456 \u0442\u0430 \u043f\u0456\u0434 \u0437\u0430\u043c\u043e\u0432\u043b\u0435\u043d\u043d\u044f<br><\/p>","ru":"<p>\u0441 \u043b\u044e\u0431\u043e\u0433\u043e \u043a\u043e\u043d\u0442\u0438\u043d\u0435\u043d\u0442\u0430,<\/p><p>\u0432 \u043d\u0430\u043b\u0438\u0447\u0438\u0438 \u0438 \u043f\u043e\u0434 \u0437\u0430\u043a\u0430\u0437<\/p>","en":"from any continent,<br>in stock and under order"}',
                'text' => '{"uk":"<p>\u0415\u043a\u043e\u043d\u043e\u043c\u0456\u044f <strong>\u0434\u043e 40%<\/strong> \u0432\u0456\u0434 \u0440\u0438\u043d\u043a\u043e\u0432\u043e\u0457 <br> \u0432\u0430\u0440\u0442\u043e\u0441\u0442\u0456<\/p>","ru":"\u042d\u043a\u043e\u043d\u043e\u043c\u0438\u044f <b>\u0434\u043e 40%<\/b> \u043e\u0442 \u0440\u044b\u043d\u043e\u0447\u043d\u043e\u0439 \u0441\u0442\u043e\u0438\u043c\u043e\u0441\u0442\u0438","en":"Savings <b>up to 40%<\/b> of the market value"}',
                'image' => '',
            ]
        ]);
    }
}
