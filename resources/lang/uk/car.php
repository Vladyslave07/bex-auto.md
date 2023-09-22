<?php
return [
    \App\Models\Car::IN_STOCK_STATUS => 'В наявності',
    \App\Models\Car::EXPECTED_STATUS => 'Очікуємо',
    \App\Models\Car::ON_ORDER_STATUS => 'Під замовлення',
    'on_order_usa' => 'Copart',
    'on_order_korea' => 'Encar',
    'sold' => 'Продано',
    'more' => 'Детальніше',
    'show_all' => 'Переглянути усі авто',
    'title_in_stock' => 'Авто в наявності',
    'equipment' => 'Комплектація',
    'detail' => [
        'more_photo' => '+:num фото',
        'buy' => 'Купити',
        'buy_in_credit' => 'Придбати у кредит',
        'characteristic' => 'Характеристики',
        'description' => 'Опис авто',
        'sold' => 'Продано',
        'know_price' => 'Дізнатися ціну',
    ],

    'btn' => [
        \App\Models\Car::ON_ORDER_STATUS => 'Замовити',
        \App\Models\Car::EXPECTED_STATUS => 'Купити',
        \App\Models\Car::IN_STOCK_STATUS => 'Купити',
        \App\Models\Car::COPRAT_STATUS => 'Замовити',
        \App\Models\Car::ENCAR_STATUS => 'Замовити',
    ],

    'product_block_title' => 'Товари для автомобіля',


    'price_null_info' => 'Ідуть торги і ціна кінцевого лоту відрізнятиметься',
    'price_from' => 'Цена від:',

];
