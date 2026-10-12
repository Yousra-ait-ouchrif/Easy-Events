<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::updateOrCreate([
        'email' => 'prestataire@gmail.com',
    ], [
        'name' => 'Prestataire Exemple',
        'password' => bcrypt('password'),
        'role' => 'prestataire',
    ]);

 if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin Principal',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // Remplace "password" si bghiti chi 7aja kbira
                'role' => 'admin',
            ]);
            User::create([
                'name' => 'Prestataire Exemple',
                'email' => 'prestataire@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'prestataire',
            ]);

        }
        
    }
}
    

