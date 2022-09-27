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
                'key' => 'title_in_stock',
                'name' => 'Заголовок блока "Авто в наличии"',
                'value' => '{"ru":"\u0410\u0432\u0442\u043e \u0432 \u043d\u0430\u043b\u0438\u0447\u0438\u0438","uk":"\u0410\u0432\u0442\u043e \u0432 \u043d\u0430\u044f\u0432\u043d\u043e\u0441\u0442\u0456","en":"Cars in stock"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'title_expected',
                'name' => 'Заголовок блока "Ожидается"',
                'value' => '{"ru":"\u041e\u0436\u0438\u0434\u0430\u0435\u0442\u0441\u044f","en":"Expected","uk":"\u041e\u0447\u0456\u043a\u0443\u0454\u0442\u044c\u0441\u044f"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'popular_request_title',
                'name' => 'Заголовок блока "Популярные запросы"',
                'value' => '{"ru":"\u041f\u043e\u043f\u0443\u043b\u044f\u0440\u043d\u044b\u0435 \u0437\u0430\u043f\u0440\u043e\u0441\u044b","uk":"\u041f\u043e\u043f\u0443\u043b\u044f\u0440\u043d\u0456 \u0437\u0430\u043f\u0438\u0442\u0438","en":"Popular requests"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'buy_and_delivery_title',
                'name' => 'Заголовок блока "Услуги приобритения"',
                'value' => '{"ru":"\u0423\u0441\u043b\u0443\u0433\u0438 \u043f\u0440\u0438\u043e\u0431\u0440\u0435\u0442\u0435\u043d\u0438\u044f \u0438 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e","en":"Car purchase and delivery services","uk":"\u041f\u043e\u0441\u043b\u0443\u0433\u0438 \u043f\u0440\u0438\u0434\u0431\u0430\u043d\u043d\u044f \u0442\u0430 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'buy_and_delivery_title_form',
                'name' => 'Заголовок формы "Найдем авто вашей мечты"',
                'value' => '{"ru":"\u041d\u0430\u0439\u0434\u0435\u043c \u0430\u0432\u0442\u043e \u0432\u0430\u0448\u0435\u0439 \u043c\u0435\u0447\u0442\u044b!","en":"Let\'s find the car of your dreams!","uk":"\u0417\u043d\u0430\u0439\u0434\u0435\u043c\u043e \u0430\u0432\u0442\u043e \u0432\u0430\u0448\u043e\u0457 \u043c\u0440\u0456\u0457!"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'buy_and_delivery_sub_title',
                'name' => 'Подзаголовок формы "Найдем авто вашей мечты!"',
                'value' => '{"ru":"\u041e\u0441\u0442\u0430\u0432\u043b\u044f\u0439\u0442\u0435 \u0437\u0430\u044f\u0432\u043a\u0443 \u0438 \u043d\u0430\u0448\u0438 \u043c\u0435\u043d\u0435\u0434\u0436\u0435\u0440\u044b \u043f\u043e\u0434\u0431\u0435\u0440\u0443\u0442 \u0430\u0432\u0442\u043e \u043f\u043e\u0434 \u0432\u0430\u0448 \u0431\u044e\u0434\u0436\u0435\u0442 \u0438 \u0437\u0430\u043f\u0440\u043e\u0441","en":"Leave a request and our managers will pick up a car according to your budget and request","uk":"\u0417\u0430\u043b\u0438\u0448\u0430\u0439\u0442\u0435 \u0437\u0430\u044f\u0432\u043a\u0443 \u0456 \u043d\u0430\u0448\u0456 \u043c\u0435\u043d\u0435\u0434\u0436\u0435\u0440\u0438 \u043f\u0456\u0434\u0431\u0435\u0440\u0443\u0442\u044c \u0430\u0432\u0442\u043e \u043f\u0456\u0434 \u0432\u0430\u0448 \u0431\u044e\u0434\u0436\u0435\u0442 \u0442\u0430 \u0437\u0430\u043f\u0438\u0442"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'get_offer_title',
                'name' => 'Заголовок блока "Получай первым выгодные предложения авто!"',
                'value' => '{"ru":"\u041f\u043e\u043b\u0443\u0447\u0430\u0439 \u043f\u0435\u0440\u0432\u044b\u043c \u0432\u044b\u0433\u043e\u0434\u043d\u044b\u0435 <br> <span class=\"color-red\">\u043f\u0440\u0435\u0434\u043b\u043e\u0436\u0435\u043d\u0438\u044f \u0430\u0432\u0442\u043e!<\/span>","en":"Be the first to get profitable <br> <span class=\"color-red\">car deals!<\/span>","uk":"\u041e\u0442\u0440\u0438\u043c\u0443\u0439 \u043f\u0435\u0440\u0448\u0438\u043c \u0432\u0438\u0433\u0456\u0434\u043d\u0456 <br> <span class=\"color-red\">\u043f\u0440\u043e\u043f\u043e\u0437\u0438\u0446\u0456\u0457 \u0430\u0432\u0442\u043e!<\/span>"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'get_offer_sub_title',
                'name' => 'Подзаголовок блока "Получай первым выгодные предложения авто!"',
                'value' => '{"ru":"\u041f\u0443\u0431\u043b\u0438\u043a\u0443\u0435\u043c \u0440\u0430\u0441\u0447\u0435\u0442\u044b \u0441\u0442\u043e\u0438\u043c\u043e\u0441\u0442\u0438, \u0432\u0438\u0434\u0435\u043e\u043e\u0431\u0437\u043e\u0440\u044b <br> \u0438 \u043e\u0442\u0437\u044b\u0432\u044b \u043a\u043b\u0438\u0435\u043d\u0442\u043e\u0432 \u0432 \u043d\u0430\u0448\u0438\u0445 \u0441\u043e\u043e\u0431\u0449\u0435\u0441\u0442\u0432\u0430\u0445.","en":"We publish cost calculations, video reviews <br> and customer reviews in our communities.","uk":"\u041f\u0443\u0431\u043b\u0456\u043a\u0443\u0454\u043c\u043e \u0440\u043e\u0437\u0440\u0430\u0445\u0443\u043d\u043a\u0438 \u0432\u0430\u0440\u0442\u043e\u0441\u0442\u0456, \u0432\u0456\u0434\u0435\u043e\u043e\u0433\u043b\u044f\u0434\u0438 <br> \u0442\u0430 \u0432\u0456\u0434\u0433\u0443\u043a\u0438 \u043a\u043b\u0456\u0454\u043d\u0442\u0456\u0432 \u0443 \u043d\u0430\u0448\u0438\u0445 \u0441\u043f\u0456\u043b\u044c\u043d\u043e\u0442\u0430\u0445."}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'auction_block_title',
                'name' => 'Заголовок блока "Аукционов"',
                'value' => '<span class="color-red">Bexhill</span><span class="color-blue">Trading</span> Auto – офіційний партнер американських <br> аукціонів Copart та IAAI',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'service_block_title',
                'name' => 'Заголовок блока "Предоставляем услуги под ключ"',
                'value' => '{"ru":"\u041f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u044f\u0435\u043c \u0443\u0441\u043b\u0443\u0433\u0438 \u043f\u043e\u0434 \u043a\u043b\u044e\u0447","en":"We provide turnkey services","uk":"\u041d\u0430\u0434\u0430\u0454\u043c\u043e \u043f\u043e\u0441\u043b\u0443\u0433\u0438 \u043f\u0456\u0434 \u043a\u043b\u044e\u0447"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'reviews_block_title',
                'name' => 'Заголовок блока "Отзывов"',
                'value' => '{"ru":"\u041e \u043d\u0430\u0441 \u0433\u043e\u0432\u043e\u0440\u044f\u0442","en":"They talk about us","uk":"\u041e \u043d\u0430\u0441 \u0433\u043e\u0432\u043e\u0440\u044f\u0442\u044c"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'reviews_block_sub_title',
                'name' => 'Подзаголовок блока "Отзывов"',
                'value' => '{"ru":"\u0414\u043b\u044f \u043d\u0430\u0441 \u0432\u0430\u0436\u0435\u043d \u043a\u0430\u0436\u0434\u044b\u0439 \u043e\u0442\u0437\u044b\u0432 \u043e \u043d\u0430\u0448\u0435\u0439 \u0440\u0430\u0431\u043e\u0442\u0435","en":"Every feedback about our work is important for us.","uk":"\u0414\u043b\u044f \u043d\u0430\u0441 \u0432\u0430\u0436\u043b\u0438\u0432\u0438\u0439 \u043a\u043e\u0436\u0435\u043d \u0432\u0456\u0434\u0433\u0443\u043a \u043f\u0440\u043e \u043d\u0430\u0448\u0443 \u0440\u043e\u0431\u043e\u0442\u0443"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'why_we_block_title',
                'name' => 'Заголовок блока "Почему мы?"',
                'value' => '{"ru":"\u041f\u043e\u0447\u0435\u043c\u0443 \u043d\u0430\u0441 \u0432\u044b\u0431\u0440\u0430\u043b\u0438 \u0431\u043e\u043b\u0435\u0435 <span class=\"color-blue\"><span class=\"bline\">5000<\/span> \u043a\u043b\u0438\u0435\u043d\u0442\u043e\u0432<\/span>","en":"Why we have been chosen by over <span class=\"color-blue\"><span class=\"bline\">5000<\/span> clients<\/span>","uk":"\u0427\u043e\u043c\u0443 \u043d\u0430\u0441 \u043e\u0431\u0440\u0430\u043b\u0438 \u043f\u043e\u043d\u0430\u0434 <span class=\"color-blue\"><span class=\"bline\">5000<\/span> \u043a\u043b\u0456\u0454\u043d\u0442\u0456\u0432<\/span>"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'popular_brand_auto_title',
                'name' => 'Заголовок блока "Популярные марки авто"',
                'value' => '{"ru":"\u041f\u043e\u043f\u0443\u043b\u044f\u0440\u043d\u044b\u0435 \u043c\u0430\u0440\u043a\u0438 \u0430\u0432\u0442\u043e","en":"Popular car brands","uk":"\u041f\u043e\u043f\u0443\u043b\u044f\u0440\u043d\u0456 \u043c\u0430\u0440\u043a\u0438 \u0430\u0432\u0442\u043e"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'order_calc_title',
                'name' => 'Заголовок формы "Закажите расчет стоимости"',
                'value' => '{"ru":"\u0417\u0430\u043a\u0430\u0436\u0438\u0442\u0435 \u0440\u0430\u0441\u0447\u0435\u0442 \u0441\u0442\u043e\u0438\u043c\u043e\u0441\u0442\u0438 <span class=\"color-blue\">\u043f\u0440\u0438\u043e\u0431\u0440\u0435\u0442\u0435\u043d\u0438\u0435 \u0438 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0430 \u0432\u0430\u0448\u0435\u0433\u043e \u0430\u0432\u0442\u043e<\/span>","en":"Request a quote <span class=\"color-blue\">purchase and delivery of your car<\/span>","uk":"\u0417\u0430\u043c\u043e\u0432\u0442\u0435 \u0440\u043e\u0437\u0440\u0430\u0445\u0443\u043d\u043e\u043a \u0432\u0430\u0440\u0442\u043e\u0441\u0442\u0456 <span class=\"color-blue\">\u043f\u0440\u0438\u0434\u0431\u0430\u043d\u043d\u044f \u0442\u0430 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0430 \u0432\u0430\u0448\u043e\u0433\u043e \u0430\u0432\u0442\u043e<\/span>"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'faq_block_title',
                'name' => 'Заголовок блока "Ответы на вопросы"',
                'value' => '{"ru":"\u041e\u0442\u0432\u0435\u0442\u044b \u043d\u0430 \u0432\u043e\u043f\u0440\u043e\u0441\u044b","en":"Answers to questions","uk":"\u0412\u0456\u0434\u043f\u043e\u0432\u0456\u0434\u0456 \u043d\u0430 \u0437\u0430\u043f\u0438\u0442\u0430\u043d\u043d\u044f"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'order_calc_sub_title',
                'name' => 'Подзаголовок формы "Закажите расчет стоимости"',
                'value' => '{"ru":"\u0423\u043a\u0430\u0436\u0438\u0442\u0435 \u0432\u0430\u0448 \u0442\u0435\u043b\u0435\u0444\u043e\u043d \u0438 \u043d\u0430\u0448 \u043c\u0435\u043d\u0435\u0434\u0436\u0435\u0440 \u0441\u0432\u044f\u0436\u0435\u0442\u0441\u044f \u0441 \u0432\u0430\u043c\u0438","uk":"\u0412\u043a\u0430\u0436\u0456\u0442\u044c \u0432\u0430\u0448 \u0442\u0435\u043b\u0435\u0444\u043e\u043d \u0442\u0430 \u043d\u0430\u0448 \u043c\u0435\u043d\u0435\u0434\u0436\u0435\u0440 \u0437\u0432\'\u044f\u0436\u0435\u0442\u044c\u0441\u044f \u0437 \u0432\u0430\u043c\u0438","en":"Enter your phone number and our manager will contact you"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'popular_auto_title',
                'name' => 'Заголовок блока "Популярные авто" на странице категории',
                'value' => '{"ru":"\u041f\u043e\u043f\u0443\u043b\u044f\u0440\u043d\u044b\u0435 \u0430\u0432\u0442\u043e","uk":"\u041f\u043e\u043f\u0443\u043b\u044f\u0440\u043d\u0456 \u0430\u0432\u0442\u043e","en":"Popular cars"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'benefits_block_title',
                'name' => 'Заголовок блока "Сотрудничество для оптовых клиентов по доставке авто из США"',
                'value' => '{"ru":"\u0421\u043e\u0442\u0440\u0443\u0434\u043d\u0438\u0447\u0435\u0441\u0442\u0432\u043e \u0434\u043b\u044f \u043e\u043f\u0442\u043e\u0432\u044b\u0445 \u043a\u043b\u0438\u0435\u043d\u0442\u043e\u0432 \u043f\u043e \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0435 \u0430\u0432\u0442\u043e \u0438\u0437 \u0421\u0428\u0410","en":"Cooperation for wholesale customers for the delivery of cars from the USA","uk":"\u0421\u043f\u0456\u0432\u043f\u0440\u0430\u0446\u044f \u0434\u043b\u044f \u043e\u043f\u0442\u043e\u0432\u0438\u0445 \u043a\u043b\u0456\u0454\u043d\u0442\u0456\u0432 \u0437 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0430\u0432\u0442\u043e \u0437\u0456 \u0421\u0428\u0410"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'application_for_coop_title',
                'name' => 'Заголовок формы "Заявка на сотрудничество"',
                'value' => '{"ru":"\u0417\u0430\u044f\u0432\u043a\u0430 \u043d\u0430 \u0441\u043e\u0442\u0440\u0443\u0434\u043d\u0438\u0447\u0435\u0441\u0442\u0432\u043e","en":"Application for cooperation","uk":"\u0417\u0430\u044f\u0432\u043a\u0430 \u043d\u0430 \u0441\u043f\u0456\u0432\u043f\u0440\u0430\u0446\u044e"}',
                'field' => '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}',
                'active' => 1,
            ],
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
            [
                'key' => 'call_back_form_title',
                'name' => 'Заголовок формы обратной связи',
                'value' => json_encode(['uk' => 'Залишай заявку і ми підберемо авто під ваш бюджет та запит', 'ru' => 'Оставляй заявку и мы подберем авто под ваш бюджет и запрос', 'en' => 'Leave an application and we will select a car for your budget and request']),
                'field' => json_encode(['name' => 'value', 'label' => 'Значение', 'type' => 'text']),
                'active' => 1,
            ],
        ]);
    }
}
