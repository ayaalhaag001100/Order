<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */        
    public static $password; // Add this line

    public function run(): void
    {
        User::factory()->count(1)->create();
       /* $userData=[ 'full_name' => fake()->name(),
        'pharmacy_name' => fake()->name(),
        'pharmacy_address'  => fake()->name(),
        'rule' => "pharmacist",
        'phone'=> fake()->randomNumber(),
        'password' => static::$password ??= Hash::make('password'),];
        User::firstOrCreate($userData);
*/


    }
}
