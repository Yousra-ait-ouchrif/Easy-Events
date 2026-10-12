<?php

namespace Database\Seeders;

use App\Models\annonce;
use App\Models\client;
use App\Models\commande;
use App\Models\message;
use App\Models\participant;
use App\Models\participer;
use App\Models\prof;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\sujet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([
        //     UsersTableSeeder::class,
        //     ServicesTableSeeder::class,
        //     ReservationsTableSeeder::class,
        // ]);
        // $this->call([
        //     stagairesTableSeeder::class,
            
        //     ]);
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // client::factory(10)->create();
        // commande::factory(10)->create();
        // participant::factory(10)->create();
        // sujet::factory(10)->create();
        // message::factory(10)->create();
        // participer::factory(10)->create();
    //     Reservation::factory(10)->create();
    Service::factory()->count(10)->create();

     }
}
