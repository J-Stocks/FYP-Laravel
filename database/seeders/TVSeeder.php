<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\TV;
use Illuminate\Database\Seeder;

class TVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TV::factory()->times(50)->create()->each(function($coverable) {
            $coverageAreas = CoverageArea::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($coverageAreas as $coverageArea) {
                $coverageArea->tvs()->attach($coverable);
            }
        });
    }
}
