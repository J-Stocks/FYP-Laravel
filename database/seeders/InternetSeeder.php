<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\Internet;
use App\Models\PayAsYouGo;
use App\Models\PayMonthly;
use Illuminate\Database\Seeder;

class InternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Internet::factory()->times(50)->create()->each(function($coverable) {
            $coverageAreas = CoverageArea::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($coverageAreas as $coverageArea) {
                $coverageArea->internets()->attach($coverable);
            }
        });
    }
}
