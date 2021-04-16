<?php

namespace Database\Seeders;

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
            CustomerSeeder::class,
            CoverageAreaSeeder::class,
            SupplierSeeder::class,
            ElectricitySeeder::class,
            GasSeeder::class,
            InternetSeeder::class,
            PhoneSeeder::class,
            TVSeeder::class,
            WaterSeeder::class,
            DealSeeder::class,
            PolicySeeder::class,
        ]);
    }
}
