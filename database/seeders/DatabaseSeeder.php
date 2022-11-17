<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolePermissionSeeder::class,
            GeneralSettingsSeeder::class,
            AdminSeeder::class,
            HeroProductSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            // SubCategorySeeder::class,
            // ChildCategorySeeder::class,
            TaxSeeder::class
        ]);
    }
}
