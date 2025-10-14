<?php
// database/factories/PublicationFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company() . ' Publishing',
        ];
    }
}
