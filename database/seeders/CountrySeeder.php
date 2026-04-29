<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'United States'],
            ['name' => 'United Kingdom'],
            ['name' => 'Canada'],
            ['name' => 'Australia'],
            ['name' => 'India'],
            ['name' => 'Germany'],
            ['name' => 'France'],
            ['name' => 'Japan'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}

