<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'default.png',
            'name' => $this->faker->name(),
            'serial' => $this->faker->numberBetween($min = 100, $max = 999).$this->faker->numberBetween($min = 100, $max = 999),
            'slug' => $this->faker->slug,
            'meta_title' => $this->faker->sentence,
            'meta_details' => $this->faker->sentence,
            'created_by' => Admin::where('status','Active')->get()->random(),
        ];
    }
}
