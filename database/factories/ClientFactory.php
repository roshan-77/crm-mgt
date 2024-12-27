<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'email' => fake()->email(),
<<<<<<< HEAD
            'number' => Str::limit(fake()->phoneNumber(),15, ''),
=======
            'number' => dump(Str::limit(fake()->phoneNumber(),15)),
>>>>>>> 9fafc7d1cb7bbaebce6c2c01a949d83253d26262
            'company' => rand(0,1),
        ];
    }
}
