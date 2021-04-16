<?php

namespace Database\Factories;

use App\Models\Phone;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $supplierId = Supplier::inRandomOrder()->get()->id;
        $validFrom = $this->faker->dateTimeBetween('-20 years', 'now');
        $validTo = $this->faker->dateTimeBetween($validFrom, (clone $validFrom)->modify('+20 years'));
        return [
            'supplier_id' => $supplierId,
            'name' => ucwords($this->faker->word),
            'description' => $this->faker->paragraph,
            'valid_from' => $validFrom,
            'valid_to' => $validTo,
        ];
    }
}
