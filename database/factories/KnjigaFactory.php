<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\User;
use App\Models\Zanr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knjiga>
 */
class KnjigaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nazivKnjige'=>$this->faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
            'godinaIzdanja'=>$this->faker->year(),
            'brojStrana'=>$this->faker->numberBetween($min=50, $max=300),
            'opis'=>$this->faker->sentence(),
            'autor_id'=>Autor::factory(),
            'zanr_id'=>Zanr::factory(),
            'user_id'=>User::factory()
        ];
    }
}
