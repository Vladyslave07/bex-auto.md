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
        'know_price' => 'Get the current price',
    ],

    'btn' => [
        \App\Models\Car::ON_ORDER_STATUS => 'Order',
        \App\Models\Car::EXPECTED_STATUS => 'Buy',
        \App\Models\Car::IN_STOCK_STATUS => 'Buy',
        \App\Models\Car::COPRAT_STATUS => 'Order',
        \App\Models\Car::ENCAR_STATUS => 'Order',
        \App\Models\Car::SOLD_STATUS => 'Find out the price',
    ],

    'product_block_title' => 'Products for car',


    'price_null_info' => 'Bidding is ongoing and the price of the final lot will be different',
    'price_from' => 'price from:',
    'price_in_usa' => 'Price in USA:',
];
