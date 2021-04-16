<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::factory()->times(50)->create()->each(function($coverable) {
            $coverageAreas = CoverageArea::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($coverageAreas as $coverageArea) {
                $coverageArea->phones()->attach($coverable);
            }
        });
    }
}
