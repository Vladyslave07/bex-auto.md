<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserAdminSeeder::class,
            SettingTableSeeder::class,
            MenuTableSeeder::class,
            BannerTableSeeder::class,
            BranchTableSeeder::class,
            CategoryTableSeeder::class,
            CarTableSeeder::class,
            PopularRequestTableSeeder::class,
            BrandTableSeeder::class,
            FaqTableSeeder::class,
        ]);
    }
}
