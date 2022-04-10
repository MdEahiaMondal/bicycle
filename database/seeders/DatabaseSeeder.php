<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use App\Models\User;
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
        $this->call([
            AdminsSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            SlidersSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
