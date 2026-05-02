<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic Plan',
            'price' => 999,
            'stripe_price_id' => 'price_1TST9uABHxrDmufcJfXUUDpl'
        ]);

        Plan::create([
            'name' => 'Pro Plan',
            'price' => 2999,
            'stripe_price_id' => 'price_1TSTBUABHxrDmufcGmTwhMrk'
        ]);
    }
}
