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
                $electricities = Electricity::all();
                $electricity = $electricities[rand(0, (count($electricities) - 1))];
                $deal->electricities()->save($electricity);
            }
            if (rand(0, 1)) {
                $gases = Gas::all();
                $gas = $gases[rand(0, (count($gases) - 1))];
                $deal->gases()->save($gas);
            }
            if (rand(0, 1)) {
                $internets = Internet::all();
                $internet = $internets[rand(0, (count($internets) - 1))];
                $deal->internets()->save($internet);
            }
            if (rand(0, 1)) {
                $phones = Phone::all();
                $phone = $phones[rand(0, (count($phones) - 1))];
                $deal->phones()->save($phone);
            }
            if (rand(0, 1)) {
                $tvs = TV::all();
                $tv = $tvs[rand(0, (count($tvs) - 1))];
                $deal->tvs()->save($tv);
            }
            if (rand(0, 1)) {
                $waters = Water::all();
                $water = $waters[rand(0, (count($waters) - 1))];
                $deal->waters()->save($water);
            }
        });
    }
}
