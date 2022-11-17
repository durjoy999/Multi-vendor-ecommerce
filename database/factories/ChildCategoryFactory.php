<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::where('status','Active')->get()->random(),
            'sub_category_id' => SubCategory::where('status','Active')->get()->random(),
            'image' => 'default.png',
            'name' => $this->faker->name(),
            'serial' =>$this->faker->numberBetween($min = 100, $max = 999).$this->faker->numberBetween($min = 100, $max = 999),
            'slug' => $this->faker->slug,
            'meta_title' => $this->faker->sentence,
            'meta_details' => $this->faker->sentence,
            'created_by' => Admin::where('status','Active')->get()->random(),
        ];
    }
}
