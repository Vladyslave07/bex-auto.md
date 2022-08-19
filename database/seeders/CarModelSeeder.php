<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('car_models')->insert([
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge challenger","ru":"Dodge challenger","en":"Dodge challenger"}',
                'slug' => 'dodge-challenger',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi q7","ru":"Audi q7","en":"Audi q7"}',
                'slug' => 'audi-q7',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge journey","ru":"Dodge journey","en":"Dodge journey"}',
                'slug' => 'dodge-journey',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mitsubishi lancer","ru":"Mitsubishi lancer","en":"Mitsubishi lancer"}',
                'slug' => 'mitsubishi-lancer',
                'brand_id' => '34'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan leaf","ru":"Nissan leaf","en":"Nissan leaf"}',
                'slug' => 'nissan-leaf',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mini cooper","ru":"Mini cooper","en":"Mini cooper"}',
                'slug' => 'mini-cooper',
                'brand_id' => '33'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford escape","ru":"Ford escape","en":"Ford escape"}',
                'slug' => 'ford-escape',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Jeep compass","ru":"Jeep compass","en":"Jeep compass"}',
                'slug' => 'jeep-compass',
                'brand_id' => '22'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet cruze","ru":"Chevrolet cruze","en":"Chevrolet cruze"}',
                'slug' => 'chevrolet-cruze',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge charger","ru":"Dodge charger","en":"Dodge charger"}',
                'slug' => 'dodge-charger',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet volt","ru":"Chevrolet volt","en":"Chevrolet volt"}',
                'slug' => 'chevrolet-volt',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw x3","ru":"Bmw x3","en":"Bmw x3"}',
                'slug' => 'bmw-x3',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Jeep patriot","ru":"Jeep patriot","en":"Jeep patriot"}',
                'slug' => 'jeep-patriot',
                'brand_id' => '22'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai elantra","ru":"Hyundai elantra","en":"Hyundai elantra"}',
                'slug' => 'hyundai-elantra',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia soul","ru":"Kia soul","en":"Kia soul"}',
                'slug' => 'kia-soul',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford edge","ru":"Ford edge","en":"Ford edge"}',
                'slug' => 'ford-edge',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford explorer","ru":"Ford explorer","en":"Ford explorer"}',
                'slug' => 'ford-explorer',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen passat","ru":"Volkswagen passat","en":"Volkswagen passat"}',
                'slug' => 'volkswagen-passat',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw x5","ru":"Bmw x5","en":"Bmw x5"}',
                'slug' => 'bmw-x5',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi a6","ru":"Audi a6","en":"Audi a6"}',
                'slug' => 'audi-a6',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford focus","ru":"Ford focus","en":"Ford focus"}',
                'slug' => 'ford-focus',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Acura mdx","ru":"Acura mdx","en":"Acura mdx"}',
                'slug' => 'acura-mdx',
                'brand_id' => '51'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet-bolt ev","ru":"Chevrolet-bolt ev","en":"Chevrolet-bolt ev"}',
                'slug' => 'chevrolet-bolt-ev',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet corvette","ru":"Chevrolet corvette","en":"Chevrolet corvette"}',
                'slug' => 'chevrolet-corvette',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi a4","ru":"Audi a4","en":"Audi a4"}',
                'slug' => 'audi-a4',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Subaru legacy","ru":"Subaru legacy","en":"Subaru legacy"}',
                'slug' => 'subaru-legacy',
                'brand_id' => '44'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan murano","ru":"Nissan murano","en":"Nissan murano"}',
                'slug' => 'nissan-murano',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia telluride","ru":"Kia telluride","en":"Kia telluride"}',
                'slug' => 'kia-telluride',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet malibu","ru":"Chevrolet malibu","en":"Chevrolet malibu"}',
                'slug' => 'chevrolet-malibu',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen atlas","ru":"Volkswagen atlas","en":"Volkswagen atlas"}',
                'slug' => 'volkswagen-atlas',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota tundra","ru":"Toyota tundra","en":"Toyota tundra"}',
                'slug' => 'toyota-tundra',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan sentra","ru":"Nissan sentra","en":"Nissan sentra"}',
                'slug' => 'nissan-sentra',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw m4","ru":"Bmw m4","en":"Bmw m4"}',
                'slug' => 'bmw-m4',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan altima","ru":"Nissan altima","en":"Nissan altima"}',
                'slug' => 'nissan-altima',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota corolla","ru":"Toyota corolla","en":"Toyota corolla"}',
                'slug' => 'toyota-corolla',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chrysler 300","ru":"Chrysler 300","en":"Chrysler 300"}',
                'slug' => 'chrysler-300',
                'brand_id' => '9'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Infiniti q50","ru":"Infiniti q50","en":"Infiniti q50"}',
                'slug' => 'infiniti-q50',
                'brand_id' => '20'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford fiesta","ru":"Ford fiesta","en":"Ford fiesta"}',
                'slug' => 'ford-fiesta',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet equinox","ru":"Chevrolet equinox","en":"Chevrolet equinox"}',
                'slug' => 'chevrolet-equinox',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai palisade","ru":"Hyundai palisade","en":"Hyundai palisade"}',
                'slug' => 'hyundai-palisade',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Buick enclave","ru":"Buick enclave","en":"Buick enclave"}',
                'slug' => 'buick-enclave',
                'brand_id' => '6'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota celica","ru":"Toyota celica","en":"Toyota celica"}',
                'slug' => 'toyota-celica',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Subaru forester","ru":"Subaru forester","en":"Subaru forester"}',
                'slug' => 'subaru-forester',
                'brand_id' => '44'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda 5","ru":"Mazda 5","en":"Mazda 5"}',
                'slug' => 'mazda-5',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda 3","ru":"Mazda 3","en":"Mazda 3"}',
                'slug' => 'mazda-3',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Porsche macan","ru":"Porsche macan","en":"Porsche macan"}',
                'slug' => 'porsche-macan',
                'brand_id' => '37'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda-cx-3 touring","ru":"Mazda-cx-3 touring","en":"Mazda-cx-3 touring"}',
                'slug' => 'mazda-cx-3-touring',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Honda accord","ru":"Honda accord","en":"Honda accord"}',
                'slug' => 'honda-accord',
                'brand_id' => '17'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia forte","ru":"Kia forte","en":"Kia forte"}',
                'slug' => 'kia-forte',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chrysler 200","ru":"Chrysler 200","en":"Chrysler 200"}',
                'slug' => 'chrysler-200',
                'brand_id' => '9'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Honda crosstour","ru":"Honda crosstour","en":"Honda crosstour"}',
                'slug' => 'honda-crosstour',
                'brand_id' => '17'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen jetta","ru":"Volkswagen jetta","en":"Volkswagen jetta"}',
                'slug' => 'volkswagen-jetta',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet trax","ru":"Chevrolet trax","en":"Chevrolet trax"}',
                'slug' => 'chevrolet-trax',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen golf","ru":"Volkswagen golf","en":"Volkswagen golf"}',
                'slug' => 'volkswagen-golf',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford-c max","ru":"Ford-c max","en":"Ford-c max"}',
                'slug' => 'ford-c-max',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi a7","ru":"Audi a7","en":"Audi a7"}',
                'slug' => 'audi-a7',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Infiniti qx60","ru":"Infiniti qx60","en":"Infiniti qx60"}',
                'slug' => 'infiniti-qx60',
                'brand_id' => '20'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus-es 350","ru":"Lexus-es 350","en":"Lexus-es 350"}',
                'slug' => 'lexus-es-350',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia rio","ru":"Kia rio","en":"Kia rio"}',
                'slug' => 'kia-rio',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Acura rdx","ru":"Acura rdx","en":"Acura rdx"}',
                'slug' => 'acura-rdx',
                'brand_id' => '51'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge avenger","ru":"Dodge avenger","en":"Dodge avenger"}',
                'slug' => 'dodge-avenger',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw m6","ru":"Bmw m6","en":"Bmw m6"}',
                'slug' => 'bmw-m6',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai tucson","ru":"Hyundai tucson","en":"Hyundai tucson"}',
                'slug' => 'hyundai-tucson',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge dart","ru":"Dodge dart","en":"Dodge dart"}',
                'slug' => 'dodge-dart',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi a5","ru":"Audi a5","en":"Audi a5"}',
                'slug' => 'audi-a5',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 740","ru":"Bmw 740","en":"Bmw 740"}',
                'slug' => 'bmw-740',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi tt","ru":"Audi tt","en":"Audi tt"}',
                'slug' => 'audi-tt',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Buick encore","ru":"Buick encore","en":"Buick encore"}',
                'slug' => 'buick-encore',
                'brand_id' => '6'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac cts","ru":"Cadillac cts","en":"Cadillac cts"}',
                'slug' => 'cadillac-cts',
                'brand_id' => '7'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lincoln mkz","ru":"Lincoln mkz","en":"Lincoln mkz"}',
                'slug' => 'lincoln-mkz',
                'brand_id' => '28'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford transit","ru":"Ford transit","en":"Ford transit"}',
                'slug' => 'ford-transit',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Honda civic","ru":"Honda civic","en":"Honda civic"}',
                'slug' => 'honda-civic',
                'brand_id' => '17'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan versa","ru":"Nissan versa","en":"Nissan versa"}',
                'slug' => 'nissan-versa',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw i8","ru":"Bmw i8","en":"Bmw i8"}',
                'slug' => 'bmw-i8',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Infiniti qx70","ru":"Infiniti qx70","en":"Infiniti qx70"}',
                'slug' => 'infiniti-qx70',
                'brand_id' => '20'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac ats","ru":"Cadillac ats","en":"Cadillac ats"}',
                'slug' => 'cadillac-ats',
                'brand_id' => '7'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi q3","ru":"Audi q3","en":"Audi q3"}',
                'slug' => 'audi-q3',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota rav4","ru":"Toyota rav4","en":"Toyota rav4"}',
                'slug' => 'toyota-rav4',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet express","ru":"Chevrolet express","en":"Chevrolet express"}',
                'slug' => 'chevrolet-express',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford flex","ru":"Ford flex","en":"Ford flex"}',
                'slug' => 'ford-flex',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda 6","ru":"Mazda 6","en":"Mazda 6"}',
                'slug' => 'mazda-6',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Porsche cayman","ru":"Porsche cayman","en":"Porsche cayman"}',
                'slug' => 'porsche-cayman',
                'brand_id' => '37'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge durango","ru":"Dodge durango","en":"Dodge durango"}',
                'slug' => 'dodge-durango',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Gmc terrain","ru":"Gmc terrain","en":"Gmc terrain"}',
                'slug' => 'gmc-terrain',
                'brand_id' => '15'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi q5","ru":"Audi q5","en":"Audi q5"}',
                'slug' => 'audi-q5',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia sorento","ru":"Kia sorento","en":"Kia sorento"}',
                'slug' => 'kia-sorento',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge-grand caravan","ru":"Dodge-grand caravan","en":"Dodge-grand caravan"}',
                'slug' => 'dodge-grand-caravan',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia optima","ru":"Kia optima","en":"Kia optima"}',
                'slug' => 'kia-optima',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen-e golf","ru":"Volkswagen-e golf","en":"Volkswagen-e golf"}',
                'slug' => 'volkswagen-e-golf',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Honda fit","ru":"Honda fit","en":"Honda fit"}',
                'slug' => 'honda-fit',
                'brand_id' => '17'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Acura ilx","ru":"Acura ilx","en":"Acura ilx"}',
                'slug' => 'acura-ilx',
                'brand_id' => '51'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota camry","ru":"Toyota camry","en":"Toyota camry"}',
                'slug' => 'toyota-camry',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chrysler-town country","ru":"Chrysler-town country","en":"Chrysler-town country"}',
                'slug' => 'chrysler-town-country',
                'brand_id' => '9'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet sonic","ru":"Chevrolet sonic","en":"Chevrolet sonic"}',
                'slug' => 'chevrolet-sonic',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 328","ru":"Bmw 328","en":"Bmw 328"}',
                'slug' => 'bmw-328',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan rogue","ru":"Nissan rogue","en":"Nissan rogue"}',
                'slug' => 'nissan-rogue',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet silverado","ru":"Chevrolet silverado","en":"Chevrolet silverado"}',
                'slug' => 'chevrolet-silverado',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai accent","ru":"Hyundai accent","en":"Hyundai accent"}',
                'slug' => 'hyundai-accent',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Subaru crosstrek","ru":"Subaru crosstrek","en":"Subaru crosstrek"}',
                'slug' => 'subaru-crosstrek',
                'brand_id' => '44'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mercedes-benz-ml 350","ru":"Mercedes-benz-ml 350","en":"Mercedes-benz-ml 350"}',
                'slug' => 'mercedes-benz-ml-350',
                'brand_id' => '32'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Honda ridgeline","ru":"Honda ridgeline","en":"Honda ridgeline"}',
                'slug' => 'honda-ridgeline',
                'brand_id' => '17'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen cc","ru":"Volkswagen cc","en":"Volkswagen cc"}',
                'slug' => 'volkswagen-cc',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Subaru impreza","ru":"Subaru impreza","en":"Subaru impreza"}',
                'slug' => 'subaru-impreza',
                'brand_id' => '44'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia sportage","ru":"Kia sportage","en":"Kia sportage"}',
                'slug' => 'kia-sportage',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus-nx 200t","ru":"Lexus-nx 200t","en":"Lexus-nx 200t"}',
                'slug' => 'lexus-nx-200t',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 535","ru":"Bmw 535","en":"Bmw 535"}',
                'slug' => 'bmw-535',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Buick regal","ru":"Buick regal","en":"Buick regal"}',
                'slug' => 'buick-regal',
                'brand_id' => '6'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus-ls 460","ru":"Lexus-ls 460","en":"Lexus-ls 460"}',
                'slug' => 'lexus-ls-460',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Gmc acadia","ru":"Gmc acadia","en":"Gmc acadia"}',
                'slug' => 'gmc-acadia',
                'brand_id' => '15'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus-rc 350","ru":"Lexus-rc 350","en":"Lexus-rc 350"}',
                'slug' => 'lexus-rc-350',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet camaro","ru":"Chevrolet camaro","en":"Chevrolet camaro"}',
                'slug' => 'chevrolet-camaro',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mitsubishi outlander","ru":"Mitsubishi outlander","en":"Mitsubishi outlander"}',
                'slug' => 'mitsubishi-outlander',
                'brand_id' => '34'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mercedes-benz-cla 250","ru":"Mercedes-benz-cla 250","en":"Mercedes-benz-cla 250"}',
                'slug' => 'mercedes-benz-cla-250',
                'brand_id' => '32'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus rx350","ru":"Lexus rx350","en":"Lexus rx350"}',
                'slug' => 'lexus-rx350',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota yaris","ru":"Toyota yaris","en":"Toyota yaris"}',
                'slug' => 'toyota-yaris',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi rs3","ru":"Audi rs3","en":"Audi rs3"}',
                'slug' => 'audi-rs3',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chrysler pacifica","ru":"Chrysler pacifica","en":"Chrysler pacifica"}',
                'slug' => 'chrysler-pacifica',
                'brand_id' => '9'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Acura tsx","ru":"Acura tsx","en":"Acura tsx"}',
                'slug' => 'acura-tsx',
                'brand_id' => '51'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan titan","ru":"Nissan titan","en":"Nissan titan"}',
                'slug' => 'nissan-titan',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi s4","ru":"Audi s4","en":"Audi s4"}',
                'slug' => 'audi-s4',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Suzuki kizashi","ru":"Suzuki kizashi","en":"Suzuki kizashi"}',
                'slug' => 'suzuki-kizashi',
                'brand_id' => '45'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Infiniti qx80","ru":"Infiniti qx80","en":"Infiniti qx80"}',
                'slug' => 'infiniti-qx80',
                'brand_id' => '20'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet traverse","ru":"Chevrolet traverse","en":"Chevrolet traverse"}',
                'slug' => 'chevrolet-traverse',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet colorado","ru":"Chevrolet colorado","en":"Chevrolet colorado"}',
                'slug' => 'chevrolet-colorado',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac srx","ru":"Cadillac srx","en":"Cadillac srx"}',
                'slug' => 'cadillac-srx',
                'brand_id' => '7'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai sonata","ru":"Hyundai sonata","en":"Hyundai sonata"}',
                'slug' => 'hyundai-sonata',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai-santa fe","ru":"Hyundai-santa fe","en":"Hyundai-santa fe"}',
                'slug' => 'hyundai-santa-fe',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 320","ru":"Bmw 320","en":"Bmw 320"}',
                'slug' => 'bmw-320',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan juke","ru":"Nissan juke","en":"Nissan juke"}',
                'slug' => 'nissan-juke',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota sienna","ru":"Toyota sienna","en":"Toyota sienna"}',
                'slug' => 'toyota-sienna',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 528","ru":"Bmw 528","en":"Bmw 528"}',
                'slug' => 'bmw-528',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Audi a8","ru":"Audi a8","en":"Audi a8"}',
                'slug' => 'audi-a8',
                'brand_id' => '3'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda-cx 7","ru":"Mazda-cx 7","en":"Mazda-cx 7"}',
                'slug' => 'mazda-cx-7',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Chevrolet captiva","ru":"Chevrolet captiva","en":"Chevrolet captiva"}',
                'slug' => 'chevrolet-captiva',
                'brand_id' => '8'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Hyundai kona","ru":"Hyundai kona","en":"Hyundai kona"}',
                'slug' => 'hyundai-kona',
                'brand_id' => '19'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Gmc sierra","ru":"Gmc sierra","en":"Gmc sierra"}',
                'slug' => 'gmc-sierra',
                'brand_id' => '15'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia cadenza","ru":"Kia cadenza","en":"Kia cadenza"}',
                'slug' => 'kia-cadenza',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac xt5","ru":"Cadillac xt5","en":"Cadillac xt5"}',
                'slug' => 'cadillac-xt5',
                'brand_id' => '7'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford mustang","ru":"Ford mustang","en":"Ford mustang"}',
                'slug' => 'ford-mustang',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Toyota highlander","ru":"Toyota highlander","en":"Toyota highlander"}',
                'slug' => 'toyota-highlander',
                'brand_id' => '47'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw i3","ru":"Bmw i3","en":"Bmw i3"}',
                'slug' => 'bmw-i3',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda-cx 5","ru":"Mazda-cx 5","en":"Mazda-cx 5"}',
                'slug' => 'mazda-cx-5',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volkswagen tiguan","ru":"Volkswagen tiguan","en":"Volkswagen tiguan"}',
                'slug' => 'volkswagen-tiguan',
                'brand_id' => '48'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia sedona","ru":"Kia sedona","en":"Kia sedona"}',
                'slug' => 'kia-sedona',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Dodge ram","ru":"Dodge ram","en":"Dodge ram"}',
                'slug' => 'dodge-ram',
                'brand_id' => '10'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Jeep wrangler","ru":"Jeep wrangler","en":"Jeep wrangler"}',
                'slug' => 'jeep-wrangler',
                'brand_id' => '22'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Acura tlx","ru":"Acura tlx","en":"Acura tlx"}',
                'slug' => 'acura-tlx',
                'brand_id' => '51'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Volvo xc90","ru":"Volvo xc90","en":"Volvo xc90"}',
                'slug' => 'volvo-xc90',
                'brand_id' => '49'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac ct6","ru":"Cadillac ct6","en":"Cadillac ct6"}',
                'slug' => 'cadillac-ct6',
                'brand_id' => '7'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ford-f 250","ru":"Ford-f 250","en":"Ford-f 250"}',
                'slug' => 'ford-f-250',
                'brand_id' => '14'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Cadillac eldorado","ru":"Cadillac eldorado","en":"Cadillac eldorado"}',
                'slug' => 'cadillac-eldorado',
                'brand_id' => '7'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan quest","ru":"Nissan quest","en":"Nissan quest"}',
                'slug' => 'nissan-quest',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Fiat 500","ru":"Fiat 500","en":"Fiat 500"}',
                'slug' => 'fiat-500',
                'brand_id' => '13'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Mazda 2","ru":"Mazda 2","en":"Mazda 2"}',
                'slug' => 'mazda-2',
                'brand_id' => '30'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 540","ru":"Bmw 540","en":"Bmw 540"}',
                'slug' => 'bmw-540',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Bmw 330","ru":"Bmw 330","en":"Bmw 330"}',
                'slug' => 'bmw-330',
                'brand_id' => '5'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus-es 300","ru":"Lexus-es 300","en":"Lexus-es 300"}',
                'slug' => 'lexus-es-300',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Ferrari 488","ru":"Ferrari 488","en":"Ferrari 488"}',
                'slug' => 'ferrari-488',
                'brand_id' => '12'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Kia-soul ev","ru":"Kia-soul ev","en":"Kia-soul ev"}',
                'slug' => 'kia-soul-ev',
                'brand_id' => '24'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Lexus-is 250","ru":"Lexus-is 250","en":"Lexus-is 250"}',
                'slug' => 'lexus-is-250',
                'brand_id' => '27'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Infiniti qx30","ru":"Infiniti qx30","en":"Infiniti qx30"}',
                'slug' => 'infiniti-qx30',
                'brand_id' => '20'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Nissan nv","ru":"Nissan nv","en":"Nissan nv"}',
                'slug' => 'nissan-nv',
                'brand_id' => '35'
            ],
            [
                'active' => '1',
                'sort' => '500',
                'title' => '{"uk":"Jeep liberty","ru":"Jeep liberty","en":"Jeep liberty"}',
                'slug' => 'jeep-liberty',
                'brand_id' => '22'
            ],

            ]);

    }
}
