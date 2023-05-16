<?php
return [
    \App\Models\Car::IN_STOCK_STATUS => 'In stock',
    \App\Models\Car::EXPECTED_STATUS => 'Expect',
    \App\Models\Car::ON_ORDER_STATUS => 'On order',
    'on_order_usa' => 'Copart',
    'on_order_korea' => 'Encar',
    'sold' => 'Sold',
    'more' => 'More',
    'show_all' => 'Show all cars',
    'title_in_stock' => 'Cars in stock',
    'equipment' => 'Equipment',
    'detail' => [
        'more_photo' => '+:num photo',
        'buy' => 'Buy',
        'buy_in_credit' => 'Buy on credit',
        'characteristic' => 'Characteristics',
        'description' => 'Description of the car',
        'sold' => 'Sold',
    ],

    'btn' => [
        \App\Models\Car::ON_ORDER_STATUS => 'Order',
        \App\Models\Car::EXPECTED_STATUS => 'Order',
        \App\Models\Car::IN_STOCK_STATUS => 'Order',
    ],

    'price_null_info' => 'Bidding is ongoing and the price of the final lot will be different',

];
