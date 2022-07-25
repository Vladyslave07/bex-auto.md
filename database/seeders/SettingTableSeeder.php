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
                'slug' => 'logo_img',
                'name' => 'Логотип',
                'value' => json_encode(['uk' => 'img/logo.jpg', 'ru' => 'img/logo.jpg', 'en' => 'img/logo.jpg']),
                'field' => json_encode(['name' => 'value', 'label' => 'Изображение', 'type' => 'image']),
                'active' => 1,
            ],
            [
                'slug' => 'logo_text',
                'name' => 'Текст логотипа',
                'value' => json_encode(['uk' => 'магазин запчастин', 'ru' => 'магазин запчастей', 'en' => 'spare parts store']),
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
            [
                'slug' => 'phone',
                'name' => 'Телефон',
                'value' => json_encode(['uk' => '+38 067 173 68 08', 'ru' => '+38 067 173 68 08', 'en' => '+38 067 173 68 08']),
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],          
        ]);
    }
}
