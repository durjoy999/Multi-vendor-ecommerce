<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::factory()
        ->count(100)
        ->state(new Sequence(
            ['status' => 'Active'],
            ['status' => 'Deactive'],
        ))
        ->create();
    }
}
