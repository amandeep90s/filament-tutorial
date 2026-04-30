<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $team1 = Team::create([
            'name' => 'Acme Corp',
            'slug' => 'acme-corp',
        ]);

        $team2 = Team::create([
            'name' => 'Tech Innovations Inc',
            'slug' => 'tech-innovations',
        ]);

        // Associate test user with both teams
        $user = User::where('email', 'test@example.com')->first();
        if ($user) {
            $user->teams()->attach([$team1->id, $team2->id]);
        }
    }
}
