<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'logo_img',
                'name' => 'Логотип',
                'value' => json_encode(['uk' => 'img/logo.jpg', 'ru' => 'img/logo.jpg', 'en' => 'img/logo.jpg']),
                'field' => json_encode(['name' => 'value', 'label' => 'Изображение', 'type' => 'image']),
                'active' => 1,
            ],
            [
                'key' => 'main-phone',
                'name' => 'Телефон в шапке',
                'value' => '+38 067 173 68 08',
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
            [
                'key' => 'main-email',
                'name' => 'Email',
                'value' => 'welcome@bexhilltrading.net',
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
            [
                'key' => 'opt-phone',
                'name' => 'Оптовый номер телефона',
                'value' => '+38 067 173 68 08',
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
            [
                'key' => 'telegram',
                'name' => 'Ссылка на телеграм',
                'value' => 'https://t.me/bexhillparts',
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
            [
                'key' => 'tiktok',
                'name' => 'Ссылка на Tik-Tok',
                'value' => '#',
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
            [
                'key' => 'viber',
                'name' => 'Ссылка на Viber',
                'value' => 'https://invite.viber.com/?g2=AQACan8arNi3yk3DFr5BFmgJMzSzeJuQcuASt4iPSz6JJw9vl9qKOpQnMCOo%2BLiQ',
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
        ]);
    }
}
