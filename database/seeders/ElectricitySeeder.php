<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\Electricity;
use App\Models\PayAsYouGo;
use App\Models\PayMonthly;
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
            $coverageAreas = CoverageArea::all()->shuffle()->slice(0, rand(1, 4));
            foreach ($coverageAreas as $coverageArea) {
                $coverable->coverageAreas()->save($coverageArea);
            }
            if (rand(0,1)) {
                $payAsYouGo = PayAsYouGo::create([
                    'base_rate' => rand(1, 100),
                    'unit_rate' => rand(1, 100),
                    'unit' => 'kW h',
                ]);
                $coverable->payAsYouGo()->save($payAsYouGo);
            } else {
                $payMonthly = PayMonthly::create([
                    'value' => rand(1, 100),
                    'minimum_months' => rand(0, 24),
                    'cancellation_cost' => rand(0, 100),
                ]);
                $coverable->payMonthly()->save($payMonthly);
            }
        });
    }
}
