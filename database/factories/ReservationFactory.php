<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
    public function definition(): array
    {
        $statuses = ['confirmé', 'en attente', 'annulé'];
        return [
           
            'prestataire_name' => fake()->name(),
            'service_type' => fake()->randomElement(['Photographe', 'Coiffeur', 'Traiteur', 'DJ']),
            'reservation_date' => fake()->dateTimeBetween('now', '+2 months'),
            'status' => fake()->randomElement($statuses),
       
        ];
    }
}
