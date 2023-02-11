<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'imeAutora'=>$this->faker->firstName(),
            'prezimeAutora'=>$this->faker->lastName(),
            'datumRodjenja'=>$this->faker->date(),
            'pol'=>$this->faker->randomElement(['muski','zenski'])
        ];
    }
}
