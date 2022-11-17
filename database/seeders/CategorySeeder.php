<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->has(
                SubCategory::factory()
                    ->count(3)
                    ->has(
                        ChildCategory::factory()
                            ->count(3)
                            ->state(new Sequence(
                                ['status' => 'Active'],
                                ['status' => 'Deactive'],
                            ))
                    )
                    ->state(new Sequence(
                        ['status' => 'Active'],
                        ['status' => 'Deactive'],
                    ))
                )
            ->count(10)
            ->state(new Sequence(
                ['status' => 'Active'],
                ['status' => 'Deactive'],
            ))
            ->create();
    }
}
