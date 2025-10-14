<?php
// database/factories/AuthorFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'bio' => $this->faker->paragraph(2),
        ];
    }
}
