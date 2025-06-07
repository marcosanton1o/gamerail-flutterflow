<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'developer' => $this->faker->company,
            'total_sales' => $this->faker->numberBetween(100, 100000),
            'image' => $this->faker->imageUrl(),
            'publisher' => $this->faker->company,
            'category' => $this->faker->word,
        ];
    }
}
