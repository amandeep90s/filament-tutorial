<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        $usCountry = Country::where('name', 'United States')->first();
        $caState = State::where('name', 'California')->first();
        $laCity = City::where('name', 'Los Angeles')->first();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'country_id' => $usCountry?->id,
            'state_id' => $caState?->id,
            'city_id' => $laCity?->id,
        ]);

        // Additional test users
        $users = [
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'country' => 'United Kingdom',
                'state' => 'England',
                'city' => 'London',
            ],
            [
                'name' => 'Raj Patel',
                'email' => 'raj@example.com',
                'country' => 'India',
                'state' => 'Maharashtra',
                'city' => 'Mumbai',
            ],
            [
                'name' => 'Sophie Müller',
                'email' => 'sophie@example.com',
                'country' => 'Germany',
                'state' => 'Bavaria',
                'city' => 'Munich',
            ],
            [
                'name' => 'Liam Thompson',
                'email' => 'liam@example.com',
                'country' => 'Canada',
                'state' => 'Ontario',
                'city' => 'Toronto',
            ],
            [
                'name' => 'Chloe Dupont',
                'email' => 'chloe@example.com',
                'country' => 'France',
                'state' => 'Île-de-France',
                'city' => 'Paris',
            ],
        ];

        foreach ($users as $userData) {
            $country = Country::where('name', $userData['country'])->first();
            $state = State::where('name', $userData['state'])->first();
            $city = City::where('name', $userData['city'])->first();

            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'country_id' => $country?->id,
                'state_id' => $state?->id,
                'city_id' => $city?->id,
            ]);
        }
    }
}
