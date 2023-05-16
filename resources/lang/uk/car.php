<?php
return [
    \App\Models\Car::IN_STOCK_STATUS => 'В наяності',
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
    ],

    'btn' => [
        \App\Models\Car::ON_ORDER_STATUS => 'Заказати',
        \App\Models\Car::EXPECTED_STATUS => 'Заказати',
        \App\Models\Car::IN_STOCK_STATUS => 'Заказати',
    ],

    'price_null_info' => 'Ідуть торги і ціна кінцевого лоту відрізнятиметься',

];
