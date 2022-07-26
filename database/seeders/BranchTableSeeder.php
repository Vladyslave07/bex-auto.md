<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'city' => '{"uk":"\u041a\u0438\u0457\u0432","ru":"\u041a\u0438\u0435\u0432","en":"Kyiv"}',
                'active' => '1',
                'sort' => '500',
                'address' => '{"uk":"\u0425\u0430\u0440\u043a\u0456\u0432\u0441\u044c\u043a\u0435 \u0448\u043e\u0441\u0435, 18","ru":"\u0425\u0430\u0440\u044c\u043a\u043e\u0432\u0441\u043a\u043e\u0435 \u0448\u043e\u0441\u0441\u0435, 18","en":"Kharkiv highway, 18"}',
                'phone' => '+38 (067) 550 34 54',
            ],
            [
                'city' => '{"uk":"\u0425\u0430\u0440\u043a\u0456\u0432","ru":"\u0425\u0430\u0440\u044c\u043a\u043e\u0432","en":"Kharkov"}',
                'active' => '1',
                'sort' => '500',
                'address' => '{"uk":"\u0413\u0456\u043c\u043d\u0430\u0437\u0456\u0439\u043d\u0430 \u043d\u0430\u0431\u0435\u0440\u0435\u0436\u043d\u0430, 18","ru":"\u0413\u0438\u043c\u043d\u0430\u0437\u0438\u0447\u0435\u0441\u043a\u0430\u044f \u043d\u0430\u0431\u0435\u0440\u0435\u0436\u043d\u0430\u044f, 18","en":"Gymnazicheskaya Naberezhnaya, 18"}',
                'phone' => '+38 (067) 712 32 54',
            ],
            [
                'city' => '{"uk":"\u041e\u0434\u0435\u0441\u0430","ru":"\u041e\u0434\u0435\u0441\u0441\u0430","en":"Odessa"}',
                'active' => '1',
                'sort' => '500',
                'address' => '{"uk":"\u0432\u0443\u043b. \u041a\u0430\u043d\u0430\u0442\u043d\u0430, 83","ru":"\u0443\u043b. \u041a\u0430\u043d\u0430\u0442\u043d\u0430\u044f, 83","en":"St. Kanatnaya, 83"}',
                'phone' => '+38 (067) 440 46 10',
            ],
            [
                'city' => '{"uk":"\u041f\u0440\u043e\u043a\u0430\u0442","ru":"\u041f\u0440\u043e\u043a\u0430\u0442","en":"Rolling"}',
                'active' => '1',
                'sort' => '500',
                'address' => '{"uk":"\u041e\u0442\u0430\u043c\u0430\u043d\u0430 \u0413\u043e\u043b\u043e\u0432\u0430\u0442\u043e\u0433\u043e 147","ru":"\u041e\u0442\u0430\u043c\u0430\u043d\u0430 \u0413\u043e\u043b\u043e\u0432\u0430\u0442\u043e\u0433\u043e 147","en":"Otaman Golovaty 147"}',
                'phone' => '+38 (067) 47 07 600',
            ],
        ]);
    }
}
