<?php

namespace App\Console\Commands;

use App\Models\Property;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GrabInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grab:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start = hrtime(true);

        $categoriesMap = [
//            'avto-dlya-taksi' => 'avto-dlya-taksi',
            'avto-iz-korei' => 'avto-iz-korei',
            'avto-pod-zakaz-iz-korei' => 'aukcion-avto-iz-korei',
            'avto-v-ukraine' => 'avto-iz-ssha',
            'boats' => 'boats',
            'cars-under' => 'aukcion-avto-iz-ssha',
            'cars' => 'avto-iz-ssha',
            'elektromobili-iz-ssha' => 'elektromobili-iz-ssha',
            'elektromobili' => 'elektromobili',
            'gibridy' => 'gibridy',
            'gruzovye-i-passazhirskie' => 'gruzovye-i-passazhirskie',
            'koreya-vykl' => 'aukcion-avto-iz-korei',
            'mashiny-v-more' => 'mashiny-v-more',
            'motorcycles' => 'motocikly',
            'parser' => 'aukcion-avto-iz-ssha',
            'rent' => 'arenda-avto',
            'specztehnika' => 'pogruzchiki',
        ];


        foreach ($categoriesMap as $slug => $categorySlug) {
            $current = 0;
            $paged = 1;

            $query = ['test' => 'y', 'cars' => 'y', 'category' => $slug];
            $response = Http::get('https://bexhilltrading.net/b2b/', $query);
            $body = $response->body();
            $cars = json_decode($body, true);
            $total = $cars['total'];

            $propertyYear = Property::getBySlug('year');
            $carcaseProperty = Property::getBySlug('carcase-type');
            $modelProperty = Property::getBySlug('model');
            $brandProperty = Property::getBySlug('brand');
            $korobkaProperty = Property::getBySlug('korobka');
            $engineVolumeProperty = Property::getBySlug('engine-type');
            $fuelProperty = Property::getBySlug('fuel');
            $mileageProperty = Property::getBySlug('mileage');
            $driveUnitProperty = Property::getBySlug('drive-unit');
            $batteryCapacityProperty = Property::getBySlug('battery-capacity');
            $reserveProperty = Property::getBySlug('power-reserve');
            $stateProperty = Property::getBySlug('state');
            $typeProperty = Property::getBySlug('type');

            while ($total != $current) {
                $query['page_num'] = $paged;

                $response = Http::get('https://bexhilltrading.net/b2b/', $query);
                $body = $response->body();
                $cars = json_decode($body, true);

                if ($cars['cars']) {

                    $carcasesType = json_decode($carcaseProperty->options, true);

                    foreach ($cars['cars'] as $car) {
                        // Проверяем наличие машины на сайте
                        if (\App\Models\Car::query()->where('slug', $car['slug'])->first()) {
                            continue;
                        }

                        $carParams = [
                            'title' => $car['title'],
                            'slug' => $car['slug'],
                            'sort' => 500,
                            'domain_id' => '6',
                            'description' => $car['description'],
                            'vin' => $car['vin'],
                            'meta_title' => $car['meta_title'],
                            'meta_description' => $car['meta_description'],
                            'active' => 1,
                            'price' => (int)$car['price'] ?? 0,
                            'locale' => 'ru'
                        ];

                        $createdCar = \App\Models\Car::create($carParams);


                        if ($createdCar) {
                            $mainCategory = \App\Models\Category::query()->where('slug', $categorySlug)->first();
                            $createdCar->categories()->attach($mainCategory->id);
                        }

                        // Галерея
                        if (key_exists('images', $car) && count($car['images']) > 0) {
                            $addImages = [];
                            $images = [];
                            foreach ($car['images'] as $key => $image) {
                                try {
                                    $src = file_get_contents($image);
                                    $imageName = basename($image);
                                    $imagePath = 'products/' . $createdCar->id .'/' . $imageName;
                                    $images[] = $imagePath;
                                    Storage::disk('public')->put($imagePath, $src);
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                            }
                            $createdCar->update([
                                'images' => $images,
                            ]);
                        }

                        // Превью картинка
                        if (key_exists('preview_picture', $car) && strlen($car['preview_picture']) > 0) {
                            $previewPicture = $car['preview_picture'];
                            try {
                                $src = file_get_contents($previewPicture);
                                $imageName = basename($previewPicture);
                                $imagePath = 'products/' . $createdCar->id .'/' . $imageName;
                                Storage::disk('public')->put($imagePath, $src);
                                $createdCar->update([
                                    'preview_image' => $imagePath,
                                ]);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }


                        // Реализовать передачу свойств товара

                        foreach ($car['attributes'] as $key => $attribute) {
                            // Марка машины
                            if ($key == 'pa_manufacturer') {
                                $brand = \App\Models\Brand::getBrandByTitle($attribute);
                                if ($brand) {
                                    // Добавление марки машины
                                    $createdCar->properties()->attach($brandProperty->id, ['slug' => $brand->slug, 'value' => $brand->title]);

                                    // Добавление привязки к категории
                                    if ($category = \App\Models\Category::query()->where('slug', $brand->slug)->first()) {
                                        $createdCar->categories()->attach($category->id);
                                    } else {
                                        $category = \App\Models\Category::create([
                                            'title' => $attribute,
                                            'locale' => 'ru'
                                        ]);
                                        $createdCar->categories()->attach($category->id);
                                    }
                                } else {
                                    $brand = \App\Models\Brand::create([
                                        'title' =>  $attribute,
                                        'locale' => 'ru'
                                    ]);
                                    $createdCar->properties()->attach($brandProperty->id, ['slug' => $brand->slug, 'value' => $brand->title]);
                                    if ($category = \App\Models\Category::query()->where('slug', $brand->slug)->first()) {
                                        $createdCar->categories()->attach($category->id);
                                    } else {
                                        $category = \App\Models\Category::create([
                                            'title' => $attribute,
                                            'locale' => 'ru'
                                        ]);
                                        $createdCar->categories()->attach($category->id);
                                    }
                                }
                            }

                            // Модель машины
                            if ($key == 'pa_rumodel') {
                                $model = \App\Models\CarModel::getModelByTitle($attribute);
                                if ($model) {
                                    $createdCar->properties()->attach($modelProperty->id, ['slug' => $model->slug, 'value' => $model->title]);
                                } else {
                                    $model = \App\Models\CarModel::create([
                                        'title' => $attribute,
                                        'slug' => Str::slug($attribute, '-'),
                                        'locale' => 'ru'
                                    ]);
                                    $createdCar->properties()->attach($modelProperty->id, ['slug' => $model->slug, 'value' => $model->title]);
                                }
                            }

                            // Год
                            if ($key == 'pa_year-manufacture') {
                                $createdCar->properties()->attach($propertyYear->id, ['slug' => $attribute, 'value' => $attribute]);
                            }

                            // Кузов
                            if ($key == 'pa_body-type') {

                                $carcase = false;
                                foreach ($carcasesType as $type) {
                                    if ($type == $attribute) {
                                        $carcase = $type;
                                    }
                                }

                                if (!$carcase) {
                                    try {
                                        $typeSlug = Property::addOptionToProperty('carcase-type', $attribute);
                                        $carcase = ['value' => $attribute, 'slug' => $typeSlug];
                                        $carcasesType[] = $carcase;
                                    } catch (Exception $e) {
                                        echo $e->getMessage();
                                    }
                                }
                                if ($carcase) {
                                    $createdCar->properties()->attach($carcaseProperty->id, ['slug' => $carcase['slug'], 'value' => $carcase['slug']]);
                                }
                            }

                            // Коробка передач
                            if ($key == 'pa_automat') {
                                $machine = ['Автомат', 'Автоматическая', 'авто', 'Робот', 'АКПП'];
                                if (in_array($attribute, $machine)) {
                                    $createdCar->properties()->attach($korobkaProperty->id, ['slug' => 'machine', 'value' => 'machine']);
                                } else {
                                    $createdCar->properties()->attach($korobkaProperty->id, ['slug' => 'manual', 'value' => 'manual']);
                                }
                            }

                            // Объем двигателя
                            if ($key == 'pa_engine-volume') {
                                $volume = (float)$attribute;
                                $createdCar->properties()->attach($engineVolumeProperty->id, ['slug' => $volume, 'value' => $volume]);
                            }

                            // Тип топлива
                            if ($key == 'pa_oil') {
                                $fuelTypes = [
                                    'petrol' => ['Бензин'],
                                    'diesel' => ['Дизель', 'DIESEL'],
                                    'gas' => ['Газ', 'CONVERTIBLE TO GASEOUS POWERED'],
                                    'hybrid' => ['Гибрид', 'HYBRID ENGINE'],
                                    'electro' => ['Электро', 'Электрика', 'ELECTRIC'],
                                    'gas/benzin' => ['Бензин/Газ', 'Газ/Бензин'],
                                ];

                                $currentFuel = false;

                                foreach ($fuelTypes as $keyFuel => $fuelType) {
                                    if (in_array($attribute, $fuelType)) {
                                        $currentFuel = $keyFuel;
                                    }
                                }
                                if ($currentFuel) {
                                    $createdCar->properties()->attach($fuelProperty->id, ['slug' => $currentFuel, 'value' => $currentFuel]);
                                } else {
                                    \Illuminate\Support\Facades\Log::critical('FUEL ERROR: ' . $createdCar->id . ' ' . $attribute);
                                }
                            }

                            // Пробег
                            if ($key == 'pa_speed') {
                                $mileage = preg_replace('/[^0-9]/', '', $attribute);
                                $createdCar->properties()->attach($mileageProperty->id, ['slug' => $mileage, 'value' => $mileage]);

                            }

                            // Привод
                            if ($key == 'pa_drive') {
                                $driveTypes = [
                                    'full' => ['4WD', '4x4 с задним приводом', 'All wheel drive', 'AWD', 'Полный', '4x4 w/Front Whl Drv'],
                                    'front' => ['Front-wheel Drive', 'Передний привод', 'Передний'],
                                    'back' => ['Rear-wheel drive', 'Задний', 'Ремень', 'Цепь', '2WD'],
                                ];
                                $currentDrive = false;
                                foreach ($driveTypes as $keyDrive => $driveType) {
                                    if (in_array($attribute, $driveType)) {
                                        $currentDrive = $keyDrive;
                                    }
                                }

                                if ($currentDrive) {
                                    $createdCar->properties()->attach($driveUnitProperty->id, ['slug' => $currentDrive, 'value' => $currentDrive]);
                                } else {
                                    \Illuminate\Support\Facades\Log::critical('DRIVE ERROR: ' . $createdCar->id . ' ' . $attribute);
                                }

                            }

                            // Емкость батареи
                            if ($key == 'pa_ruyomkost-batarei') {
                                $capacity = (float)$attribute;
                                $createdCar->properties()->attach($batteryCapacityProperty->id, ['slug' => $capacity, 'value' => $capacity]);
                            }

                            // Запас хода
                            if ($key == 'pa_ruzapas-hoda') {
                                $reserve = (int)$attribute;
                                $createdCar->properties()->attach($reserveProperty->id, ['slug' => $reserve, 'value' => $reserve]);
                            }

                            // Состояние
                            if ($key == 'pa_condition') {
                                $stateTypes = [
                                    'new' => ['New', 'Новый'],
                                    'used' => ['б/у', 'бу', 'С пробегом'],
                                ];

                                $currentState = false;
                                foreach ($stateTypes as $keyState => $stateType) {
                                    if (in_array($attribute, $stateType)) {
                                        $currentState = $keyState;
                                    }
                                }

                                if ($currentState) {
                                    $createdCar->properties()->attach($stateProperty->id, ['slug' => $currentState, 'value' => $currentState]);
                                } else {
                                    \Illuminate\Support\Facades\Log::critical('STATE ERROR: ' . $createdCar->id . ' ' . $attribute);
                                }
                            }
                        }

                        // По умолчанию если не указано состояние устанавливать "с пробегом"
                        if (!key_exists('pa_condition', $car['attributes'])) {
                            $createdCar->properties()->attach($stateProperty->id, ['slug' => 'used', 'value' => 'used']);
                        }

                        if ($categorySlug == 'motorcycles') {
                            $createdCar->properties()->attach($typeProperty->id, ['slug' => 'moto', 'value' => 'moto']);
                        } elseif ($categorySlug == 'pogruzchiki') {
                            $createdCar->properties()->attach($typeProperty->id, ['slug' => 'truck', 'value' => 'truck']);
                        } else {
                            $createdCar->properties()->attach($typeProperty->id, ['slug' => 'auto', 'value' => 'auto']);
                        }

                    }


                    $current += count($cars['cars']);
                    $paged++;

                    $end = hrtime(true);
                    $elapsedTime = ($end - $start) / 1e+6; // convert to milliseconds
                    $elapsedSeconds = $elapsedTime / 1000; // convert to seconds

                    dump('Кол-во секунд на выполнение одной итерации: ' . $elapsedSeconds);
                    dump('Текущая категория: ' . $categorySlug);
                    dump('Добавлено машин: ' . $current . ' Из ' . $total );
                } else {
                    break;
                }

            }
        }

        $end = hrtime(true);
        $elapsedTime = ($end - $start) / 1e+6; // convert to milliseconds
        $elapsedSeconds = $elapsedTime / 1000; // convert to seconds

        dd($elapsedSeconds);
    }
}
