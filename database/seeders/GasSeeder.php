<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\Gas;
use Illuminate\Database\Seeder;

class GasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gas::factory()->times(50)->create()->each(function($coverable) {
            $coverageAreas = CoverageArea::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($coverageAreas as $coverageArea) {
                $coverageArea->gases()->attach($coverable);
            }
        });
    }
}
