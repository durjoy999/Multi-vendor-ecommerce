<?php

namespace Database\Seeders;

use App\Models\ChildCategory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildCategory::factory()
        ->count(100)
        ->state(new Sequence(
            ['status' => 'Active'],
            ['status' => 'Deactive'],
        ))
        ->create();
    }
}
