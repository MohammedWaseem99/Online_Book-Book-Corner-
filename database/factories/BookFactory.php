<?php
// database/factories/BookFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'discount' => $this->faker->optional(0.3)->randomFloat(2, 5, 50),
            'picture' => null,
        ];
    }
}
