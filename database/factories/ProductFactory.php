<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'scientific_name'=> fake()->name(),
            'commercial_name'=> fake()->name(),
            'manufacturer'=> fake()->name(),
            'img_path'=> fake()->name(),
            'price'=> fake()->randomFloat(),
            'quantity'=> fake()->randomNumber(),
            'expiration_date'=> fake()->date('Y-m-d', '2024-12-12'),
            'category_id' => 2,
            'user_id' => 2,
            /*
            'scientific_name' => $this->faker->name(),
            'commercial_name' => $this->faker->name(),
            'manufacturer' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'qty' => $this->faker->randomNumber(2),
            'expiration_date' => $this->faker->date('Y-m-d', '2024-12-12'),
    */
        ];
    }
}
