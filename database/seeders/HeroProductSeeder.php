<?php

namespace Database\Seeders;

use App\Models\HeroProduct;
use Illuminate\Database\Seeder;

class HeroProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeroProduct::create([
            'title' => 'Tea Cup',
            'product_link' => 'https://birit.com.bd',
            'price' => '50',
            'image' => 'default.png'
        ]);
    }
}
