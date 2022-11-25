<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'title' => '{"uk":"Geely","ru":"Geely","en":"Geely"}',
                'slug' => 'geely',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '12400.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"Product description"}',
            ],
            [
                'title' => '{"uk":"Jeep","ru":"Jeep","en":"Jeep"}',
                'slug' => 'jeep',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '14000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will"}',
            ],
            [
                'title' => '{"uk":"Nisan","ru":"NIsan","en":"NIsan"}',
                'slug' => 'nisan',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '23000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
            [
                'title' => '{"uk":"Ford","ru":"Ford","en":"Ford"}',
                'slug' => 'ford',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '22000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
            [
                'title' => '{"uk":"Jeep","ru":"Jeep","en":"Jeep"}',
                'slug' => 'jeep-5',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '14000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will"}',
            ],
            [
                'title' => '{"uk":"Nisan","ru":"NIsan","en":"NIsan"}',
                'slug' => 'nisan-5',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '23000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
            [
                'title' => '{"uk":"Ford","ru":"Ford","en":"Ford"}',
                'slug' => 'ford-5',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '22000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
            [
                'title' => '{"uk":"Geely","ru":"Geely","en":"Geely"}',
                'slug' => 'geely-3',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'expect',
                'price' => '12400.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"Product description"}',
            ],
            [
                'title' => '{"uk":"Jeep","ru":"Jeep","en":"Jeep"}',
                'slug' => 'jeep-2',
                'active' => '0',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'expect',
                'price' => '14000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will"}',
            ],
            [
                'title' => '{"uk":"Nisan","ru":"NIsan","en":"NIsan"}',
                'slug' => 'nisan-3',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'expect',
                'price' => '23000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
            [
                'title' => '{"uk":"Geely","ru":"Geely","en":"Geely"}',
                'slug' => 'geely-2',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'expect',
                'price' => '12400.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"Product description"}',
            ],
            [
                'title' => '{"uk":"Jeep","ru":"Jeep","en":"Jeep"}',
                'slug' => 'jeep-3',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'expect',
                'price' => '14000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will"}',
            ],
            [
                'title' => '{"uk":"Nisan","ru":"NIsan","en":"NIsan"}',
                'slug' => 'nisan-2',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'expect',
                'price' => '23000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
            [
                'title' => '{"uk":"Geely","ru":"Geely","en":"Geely"}',
                'slug' => 'geely-1',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '12400.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"Product description"}',
            ],
            [
                'title' => '{"uk":"Jeep","ru":"Jeep","en":"Jeep"}',
                'slug' => 'jeep-1',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '14000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will"}',
            ],
            [
                'title' => '{"uk":"Nisan","ru":"NIsan","en":"NIsan"}',
                'slug' => 'nisan-1',
                'active' => '1',
                'sort' => 500,
                'info' => '{"uk":"\u0411\u0412 \u0446\u0456\u043b\u0430 - \u0446\u0435 \u0432\u0436\u0438\u0432\u0430\u043d\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0456\u0434\u0456\u0432 \u0443\u0448\u043a\u043e\u0434\u0436\u0435\u043d\u043d\u044f.","ru":"\u0411\u0412 \u0446\u0435\u043b\u0430\u044f \u2013 \u044d\u0442\u043e \u043f\u043e\u0434\u0435\u0440\u0436\u0430\u043d\u043d\u043e\u0435 \u0430\u0432\u0442\u043e \u0431\u0435\u0437 \u0441\u043b\u0435\u0434\u043e\u0432 \u043f\u043e\u0432\u0440\u0435\u0436\u0434\u0435\u043d\u0438\u044f.","en":"A complete second-hand car is a used car with no signs of damage."}',
                'status' => 'in_stock',
                'price' => '23000.00',
                'description' => '{"uk":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","ru":"\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u043e\u0432\u0430\u0440\u0430","en":"The order will be delivered"}',
            ],
        ]);
    }
}
