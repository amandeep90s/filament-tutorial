<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology',      'slug' => 'technology'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Laravel',         'slug' => 'laravel'],
            ['name' => 'Design',          'slug' => 'design'],
            ['name' => 'DevOps',          'slug' => 'devops'],
            ['name' => 'Security',        'slug' => 'security'],
            ['name' => 'Business',        'slug' => 'business'],
            ['name' => 'Career',          'slug' => 'career'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

