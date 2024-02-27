<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname' => 'Monish',
            'lname' => 'Roy',
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'role_id' => '1',
            'is_verified' => '1',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'fname' => 'Monish',
            'lname' => 'Roy',
            'email' => 'roymonish712@gmail.com',
            'username' => 'monishroy',
            'role_id' => '2',
            'is_verified' => '1',
            'password' => Hash::make('123456'),
        ]);

        // $faker = Faker::create();

        // for ($i = 0; $i < 100; $i++) {
        //     # code...
        //     User::create([
        //         'fname' => $faker->name,
        //         'lname' => $faker->name,
        //         'email' => $faker->email,
        //         'phone' => $faker->phoneNumber(),
        //         'role_id' => '2',
        //         'password' => Hash::make('123456'),
        //     ]);
        // }
    }
}
