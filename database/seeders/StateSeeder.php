<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            // United States (id: 1)
            'United States' => [
                'California', 'Texas', 'New York', 'Florida', 'Illinois',
            ],
            // United Kingdom (id: 2)
            'United Kingdom' => [
                'England', 'Scotland', 'Wales', 'Northern Ireland',
            ],
            // Canada (id: 3)
            'Canada' => [
                'Ontario', 'Quebec', 'British Columbia', 'Alberta',
            ],
            // Australia (id: 4)
            'Australia' => [
                'New South Wales', 'Victoria', 'Queensland', 'Western Australia',
            ],
            // India (id: 5)
            'India' => [
                'Maharashtra', 'Karnataka', 'Tamil Nadu', 'Delhi', 'Uttar Pradesh',
            ],
            // Germany (id: 6)
            'Germany' => [
                'Bavaria', 'Berlin', 'Hamburg', 'Saxony',
            ],
            // France (id: 7)
            'France' => [
                'Île-de-France', 'Provence-Alpes-Côte d\'Azur', 'Auvergne-Rhône-Alpes',
            ],
            // Japan (id: 8)
            'Japan' => [
                'Tokyo', 'Osaka', 'Kyoto', 'Hokkaido',
            ],
        ];

        foreach ($states as $countryName => $stateNames) {
            $country = Country::where('name', $countryName)->first();
            if ($country) {
                foreach ($stateNames as $stateName) {
                    State::create([
                        'name'       => $stateName,
                        'country_id' => $country->id,
                    ]);
                }
            }
        }
    }
}

