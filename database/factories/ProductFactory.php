<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'slug' => fake()->slug(),
            'category' => fake()->randomElement(array_keys(Product::CATEGORIES)),
            'description' => fake()->sentence(),
            'is_featured' => false,
        ];
    }
}
