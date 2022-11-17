<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Sequence;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = Admin::where('email','superadmin@gmail.com')->first();
        // if(isNull($admin)){
        //    $admin =  Admin::create([
        //         'name' => 'SuperAdmin',
        //         'email' => 'superadmin@example.com',
        //         'password' => Hash::make('123456789'),
        //         'status' => 'Active'
        //     ]);
        //     $admin->assignRole('SuperAdmin');
        // }

        
       
        $admins =   Admin::factory()
                            ->count(10)
                            ->state(new Sequence(
                                ['status' => 'Active'],
                                ['status' => 'Deactive'],
                            ))
                            ->create();

        foreach ($admins as $admin) {
            $admin->assignRole('SuperAdmin');
        }
    }
}
