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
        $customers = Customer::all();
        $customerId = $customers[rand(0, (count($customers) - 1))]->id;
        $deals= Customer::all();
        $dealId = $deals[rand(0, (count($deals) - 1))]->id;
        return [
            'customer_id' => $customerId,
            'deal_id' => $dealId,
        ];
    }
}
