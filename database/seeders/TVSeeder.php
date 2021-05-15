<?php

namespace Database\Seeders;

use App\Models\CoverageArea;
use App\Models\PayAsYouGo;
use App\Models\PayMonthly;
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
            $coverageAreas = CoverageArea::all()->shuffle()->slice(0, rand(1, 4));
            foreach ($coverageAreas as $coverageArea) {
                $coverable->coverageAreas()->save($coverageArea);
            }
            $payMonthly = PayMonthly::create([
                'value' => rand(1, 100),
                'minimum_months' => rand(0, 24),
                'cancellation_cost' => rand(0, 100),
            ]);
            $coverable->payMonthly()->save($payMonthly);
        });
    }
}
