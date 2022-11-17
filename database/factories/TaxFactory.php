<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'amount' => $this->faker->numberBetween($min = 10, $max = 25),
            'created_by' => Admin::where('status','Active')->get()->random(),
        ];
    }
}
