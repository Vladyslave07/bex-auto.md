<?php
return [
    \App\Models\Car::IN_STOCK_STATUS => 'В наличии',
    \App\Models\Car::EXPECTED_STATUS => 'Ожидается',
    \App\Models\Car::ON_ORDER_STATUS => 'Под заказ',
    'on_order_usa' => 'Copart',
    'on_order_korea' => 'Encar',
    'sold' => 'Продано',
    'more' => 'Подробнее',
    'show_all' => 'Посмотреть все авто',
    'title_in_stock' => 'Авто в наличии',
    'equipment' => 'Комплектация',
    'detail' => [
        'more_photo' => '+:num фото',
        'buy' => 'Купить',
        'buy_in_credit' => 'Купить в кредит',
        'characteristic' => 'Характеристики',
        'description' => 'Описание авто',
        'sold' => 'Продано',
    ],

    'btn' => [
        \App\Models\Car::ON_ORDER_STATUS => 'Заказать',
        \App\Models\Car::EXPECTED_STATUS => 'Заказать',
        \App\Models\Car::IN_STOCK_STATUS => 'Заказать',
    ],

    'price_null_info' => 'Идут торги и цена конечного лота будет отличаться',
];
