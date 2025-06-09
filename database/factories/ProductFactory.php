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
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 999),
            'total_sales' => $this->faker->numberBetween(0, 10000),
            'category' => $this->faker->word,
        ];

    }
}
