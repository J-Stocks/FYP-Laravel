<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Deal;
use App\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PolicyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Policy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'deal_id' => Deal::inRandomOrder()->first()->id,
        ];
    }
}
