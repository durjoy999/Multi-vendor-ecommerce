<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tax::factory()
        ->count(10)
        ->state(new Sequence(
            ['status' => 'Active'],
            ['status' => 'Deactive'],
        ))
        ->create();
    }
}
