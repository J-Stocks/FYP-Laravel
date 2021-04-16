<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Electricity;
use App\Models\Gas;
use App\Models\Internet;
use App\Models\Phone;
use App\Models\TV;
use App\Models\Water;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deal::factory()->times(50)->create()->each(function ($deal) {
            if (rand(0, 1)) {
                $electricity = Electricity::inRandomOrder()->first();
                $deal->electricities()->attach($electricity);
            }
            if (rand(0, 1)) {
                $gas = Gas::inRandomOrder()->first();
                $deal->gases()->attach($gas);
            }
            if (rand(0, 1)) {
                $internet = Internet::inRandomOrder()->first();
                $deal->internets()->attach($internet);
            }
            if (rand(0, 1)) {
                $phone = Phone::inRandomOrder()->first();
                $deal->phones()->attach($phone);
            }
            if (rand(0, 1)) {
                $tv = TV::inRandomOrder()->first();
                $deal->tvs()->attach($tv);
            }
            if (rand(0, 1)) {
                $water = Water::inRandomOrder()->first();
                $deal->waters()->attach($water);
            }
        });
    }
}
