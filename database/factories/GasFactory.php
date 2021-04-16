<?php

namespace Database\Factories;

use App\Models\Gas;
use App\Models\PayAsYouGo;
use App\Models\PayMonthly;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class GasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $supplierId = Supplier::inRandomOrder()->first()->id;
        $validFrom = $this->faker->dateTimeBetween('-20 years', 'now');
        $validTo = $this->faker->dateTimeBetween($validFrom, (clone $validFrom)->modify('+20 years'));
        if (rand(0,1)) {
            $paymentId = PayAsYouGo::create([
                'base_rate' => rand(1, 100),
                'unit_rate' => rand(1, 100),
                'unit' => 'kW h',
            ]);
            $paymentType = PayAsYouGo::class;
        } else {
            $paymentId = PayMonthly::create([
                'value' => rand(1, 100),
                'minimum_months' => rand(0, 24),
                'cancellation_cost' => rand(0, 100),
            ])->id;
            $paymentType = PayMonthly::class;
        }
        return [
            'supplier_id' => $supplierId,
            'name' => ucwords($this->faker->word),
            'description' => $this->faker->paragraph,
            'valid_from' => $validFrom,
            'valid_to' => $validTo,
            'payable_id' => $paymentId,
            'payable_type' => $paymentType,
        ];
    }
}
