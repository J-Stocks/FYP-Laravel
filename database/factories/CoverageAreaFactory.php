<?php

namespace Database\Factories;

use App\Models\CoverageArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoverageAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoverageArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->postcode,
        ];
    }
}
