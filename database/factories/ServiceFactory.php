<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // ydir user jdida automatiquement
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'prix' => $this->faker->randomFloat(2, 500, 5000),
            'image' => 'images/' . fake()->randomElement([
        'coiffur.jpeg', 
        'decoration.jpg', 
        'istockphoto-1031853464-612x612.jpg',
        'location.jpg',
        'téléchargement (4).jpeg',
        'téléchargement.jpeg',
        'téléchargement (2).jpeg',
        'WhatsApp Image 2025-04-04 à 20.01.49_735699ae.jpg',
        'WhatsApp Image 2025-04-04 à 19.55.07_2f5ed36e.jpg',
        'WhatsApp Image 2025-04-04 à 19.50.28_8f0cb76d.jpg',
        'WhatsApp Image 2025-04-04 à 17.16.33_b5b6f3ca.jpg'
    ]),
            
        ];
    }
}
