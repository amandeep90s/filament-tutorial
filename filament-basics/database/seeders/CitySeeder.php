<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'Sacramento'],
            'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio'],
            'New York' => ['New York City', 'Buffalo', 'Rochester'],
            'Florida' => ['Miami', 'Orlando', 'Tampa'],
            'Illinois' => ['Chicago', 'Springfield', 'Naperville'],
            'England' => ['London', 'Manchester', 'Birmingham', 'Leeds'],
            'Scotland' => ['Edinburgh', 'Glasgow', 'Aberdeen'],
            'Wales' => ['Cardiff', 'Swansea'],
            'Northern Ireland' => ['Belfast', 'Derry'],
            'Ontario' => ['Toronto', 'Ottawa', 'Hamilton'],
            'Quebec' => ['Montreal', 'Quebec City'],
            'British Columbia' => ['Vancouver', 'Victoria'],
            'Alberta' => ['Calgary', 'Edmonton'],
            'New South Wales' => ['Sydney', 'Newcastle', 'Wollongong'],
            'Victoria' => ['Melbourne', 'Geelong'],
            'Queensland' => ['Brisbane', 'Gold Coast'],
            'Western Australia' => ['Perth', 'Fremantle'],
            'Maharashtra' => ['Mumbai', 'Pune', 'Nagpur'],
            'Karnataka' => ['Bangalore', 'Mysore', 'Hubli'],
            'Tamil Nadu' => ['Chennai', 'Coimbatore', 'Madurai'],
            'Delhi' => ['New Delhi', 'Dwarka', 'Rohini'],
            'Uttar Pradesh' => ['Lucknow', 'Kanpur', 'Agra'],
            'Bavaria' => ['Munich', 'Nuremberg', 'Augsburg'],
            'Berlin' => ['Berlin'],
            'Hamburg' => ['Hamburg'],
            'Saxony' => ['Dresden', 'Leipzig'],
            'Île-de-France' => ['Paris', 'Versailles', 'Boulogne-Billancourt'],
            'Provence-Alpes-Côte d\'Azur' => ['Marseille', 'Nice', 'Toulon'],
            'Auvergne-Rhône-Alpes' => ['Lyon', 'Grenoble', 'Clermont-Ferrand'],
            'Tokyo' => ['Shinjuku', 'Shibuya', 'Minato'],
            'Osaka' => ['Osaka City', 'Sakai', 'Higashiosaka'],
            'Kyoto' => ['Kyoto City', 'Uji'],
            'Hokkaido' => ['Sapporo', 'Asahikawa'],
        ];

        foreach ($cities as $stateName => $cityNames) {
            $state = State::where('name', $stateName)->first();
            if ($state) {
                foreach ($cityNames as $cityName) {
                    City::create([
                        'name' => $cityName,
                        'state_id' => $state->id,
                    ]);
                }
            }
        }
    }
}
