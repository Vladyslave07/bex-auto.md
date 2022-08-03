<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Alfa Romeo","ru":"Alfa Romeo","en":"Alfa Romeo"}',
                'slug' => '{"uk":"alfa-romeo","ru":"alfa-romeo","en":"alfa-romeo"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Aston Martin","ru":"Aston Martin","en":"Aston Martin"}',
                'slug' => '{"uk":"aston-martin","ru":"aston-martin","en":"aston-martin"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi","ru":"Audi","en":"Audi"}',
                'slug' => '{"uk":"audi","ru":"audi","en":"audi"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bentley","ru":"Bentley","en":"Bentley"}',
                'slug' => '{"uk":"bentley","ru":"bentley","en":"bentley"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"BMW","ru":"BMW","en":"BMW"}',
                'slug' => '{"uk":"bmw","ru":"bmw","en":"bmw"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Buick","ru":"Buick","en":"Buick"}',
                'slug' => '{"uk":"buick","ru":"buick","en":"buick"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac","ru":"Cadillac","en":"Cadillac"}',
                'slug' => '{"uk":"cadillac","ru":"cadillac","en":"cadillac"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet","ru":"Chevrolet","en":"Chevrolet"}',
                'slug' => '{"uk":"chevrolet","ru":"chevrolet","en":"chevrolet"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chrysler","ru":"Chrysler","en":"Chrysler"}',
                'slug' => '{"uk":"chrysler","ru":"chrysler","en":"chrysler"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge","ru":"Dodge","en":"Dodge"}',
                'slug' => '{"uk":"dodge","ru":"dodge","en":"dodge"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ducati","ru":"Ducati","en":"Ducati"}',
                'slug' => '{"uk":"ducati","ru":"ducati","en":"ducati"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ferrari","ru":"Ferrari","en":"Ferrari"}',
                'slug' => '{"uk":"ferrari","ru":"ferrari","en":"ferrari"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Fiat","ru":"Fiat","en":"Fiat"}',
                'slug' => '{"uk":"fiat","ru":"fiat","en":"fiat"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford","ru":"Ford","en":"Ford"}',
                'slug' => '{"uk":"ford","ru":"ford","en":"ford"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"GMC","ru":"GMC","en":"GMC"}',
                'slug' => '{"uk":"gmc","ru":"gmc","en":"gmc"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Harley Davidson","ru":"Harley Davidson","en":"Harley Davidson"}',
                'slug' => '{"uk":"harley-davidson","ru":"harley-davidson","en":"harley-davidson"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Honda","ru":"Honda","en":"Honda"}',
                'slug' => '{"uk":"honda","ru":"honda","en":"honda"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hummer","ru":"Hummer","en":"Hummer"}',
                'slug' => '{"uk":"hummer","ru":"hummer","en":"hummer"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai","ru":"Hyundai","en":"Hyundai"}',
                'slug' => '{"uk":"hyundai","ru":"hyundai","en":"hyundai"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Infiniti","ru":"Infiniti","en":"Infiniti"}',
                'slug' => '{"uk":"infiniti","ru":"infiniti","en":"infiniti"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Jaguar","ru":"Jaguar","en":"Jaguar"}',
                'slug' => '{"uk":"jaguar","ru":"jaguar","en":"jaguar"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Jeep","ru":"Jeep","en":"Jeep"}',
                'slug' => '{"uk":"jeep","ru":"jeep","en":"jeep"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kawasaki","ru":"Kawasaki","en":"Kawasaki"}',
                'slug' => '{"uk":"kawasaki","ru":"kawasaki","en":"kawasaki"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"KIA","ru":"KIA","en":"KIA"}',
                'slug' => '{"uk":"kia","ru":"kia","en":"kia"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lamborghini","ru":"Lamborghini","en":"Lamborghini"}',
                'slug' => '{"uk":"lamborghini","ru":"lamborghini","en":"lamborghini"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Land Rover","ru":"Land Rover","en":"Land Rover"}',
                'slug' => '{"uk":"land-rover","ru":"land-rover","en":"land-rover"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus","ru":"Lexus","en":"Lexus"}',
                'slug' => '{"uk":"lexus","ru":"lexus","en":"lexus"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lincoln Maserati","ru":"Lincoln Maserati","en":"Lincoln Maserati"}',
                'slug' => '{"uk":"lincoln-maserati","ru":"lincoln-maserati","en":"lincoln-maserati"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Maybach","ru":"Maybach","en":"Maybach"}',
                'slug' => '{"uk":"maybach","ru":"maybach","en":"maybach"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda","ru":"Mazda","en":"Mazda"}',
                'slug' => '{"uk":"mazda","ru":"mazda","en":"mazda"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"McLaren","ru":"McLaren","en":"McLaren"}',
                'slug' => '{"uk":"mclaren","ru":"mclaren","en":"mclaren"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mercedes-Benz","ru":"Mercedes-Benz","en":"Mercedes-Benz"}',
                'slug' => '{"uk":"mercedes-benz","ru":"mercedes-benz","en":"mercedes-benz"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mini Cooper","ru":"Mini Cooper","en":"Mini Cooper"}',
                'slug' => '{"uk":"mini-cooper","ru":"mini-cooper","en":"mini-cooper"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mitsubishi","ru":"Mitsubishi","en":"Mitsubishi"}',
                'slug' => '{"uk":"mitsubishi","ru":"mitsubishi","en":"mitsubishi"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan","ru":"Nissan","en":"Nissan"}',
                'slug' => '{"uk":"nissan","ru":"nissan","en":"nissan"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Pontiac","ru":"Pontiac","en":"Pontiac"}',
                'slug' => '{"uk":"pontiac","ru":"pontiac","en":"pontiac"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Porsche","ru":"Porsche","en":"Porsche"}',
                'slug' => '{"uk":"porsche","ru":"porsche","en":"porsche"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"RAM","ru":"RAM","en":"RAM"}',
                'slug' => '{"uk":"ram","ru":"ram","en":"ram"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Range Rover","ru":"Range Rover","en":"Range Rover"}',
                'slug' => '{"uk":"range_rover","ru":"range_rover","en":"range_rover"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Renault","ru":"Renault","en":"Renault"}',
                'slug' => '{"uk":"renault","ru":"renault","en":"renault"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Rolls Royce","ru":"Rolls Royce","en":"Rolls Royce"}',
                'slug' => '{"uk":"rolls-royce","ru":"rolls-royce","en":"rolls-royce"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Scion","ru":"Scion","en":"Scion"}',
                'slug' => '{"uk":"scion","ru":"scion","en":"scion"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Smart","ru":"Smart","en":"Smart"}',
                'slug' => '{"uk":"smart","ru":"smart","en":"smart"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Subaru","ru":"Subaru","en":"Subaru"}',
                'slug' => '{"uk":"subaru","ru":"subaru","en":"subaru"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Suzuki","ru":"Suzuki","en":"Suzuki"}',
                'slug' => '{"uk":"suzuki","ru":"suzuki","en":"suzuki"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Tesla","ru":"Tesla","en":"Tesla"}',
                'slug' => '{"uk":"tesla","ru":"tesla","en":"tesla"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota","ru":"Toyota","en":"Toyota"}',
                'slug' => '{"uk":"toyota","ru":"toyota","en":"toyota"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen","ru":"Volkswagen","en":"Volkswagen"}',
                'slug' => '{"uk":"volkswagen","ru":"volkswagen","en":"volkswagen"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volvo","ru":"Volvo","en":"Volvo"}',
                'slug' => '{"uk":"volvo","ru":"volvo","en":"volvo"}',
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Yamaha","ru":"Yamaha","en":"Yamaha"}',
                'slug' => '{"uk":"yamaha","ru":"yamaha","en":"yamaha"}',
            ],
        ]);
    }
}
