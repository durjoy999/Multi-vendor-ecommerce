<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory()
        ->count(100)
        ->state(new Sequence(
            ['status' => 'Active'],
            ['status' => 'Deactive'],
        ))
        ->create();
    }
}
