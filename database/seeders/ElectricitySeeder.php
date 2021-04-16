<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\Electricity;
use Illuminate\Database\Seeder;

class ElectricitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Electricity::factory()->times(50)->create()->each(function($coverable) {
            $coverageAreas = CoverageArea::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($coverageAreas as $coverageArea) {
                $coverageArea->electricities()->attach($coverable);
            }
        });
    }
}
