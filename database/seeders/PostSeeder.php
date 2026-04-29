<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'        => 'Getting Started with Laravel 11',
                'slug'         => 'getting-started-with-laravel-11',
                'category'     => 'Laravel',
                'color'        => '#FF2D20',
                'body'         => 'Laravel 11 brings a streamlined application structure, a new minimal skeleton, and powerful new features like the updated routing system. In this post, we walk through installation and core concepts.',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'tags'         => ['Laravel', 'PHP', 'Tutorial'],
            ],
            [
                'title'        => 'Building Admin Panels with Filament',
                'slug'         => 'building-admin-panels-with-filament',
                'category'     => 'Web Development',
                'color'        => '#7C3AED',
                'body'         => 'Filament is a collection of beautiful full-stack components for Laravel. It makes generating admin panels a breeze. Let us explore how to use Resources, Tables, and Forms.',
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'tags'         => ['Filament', 'Laravel', 'PHP'],
            ],
            [
                'title'        => 'Mastering Livewire 3',
                'slug'         => 'mastering-livewire-3',
                'category'     => 'Web Development',
                'color'        => '#EF4444',
                'body'         => 'Livewire 3 offers a reactive, stateful component system built entirely in PHP. In this deep-dive we cover components, events, and form validation.',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'tags'         => ['Livewire', 'Laravel', 'PHP'],
            ],
            [
                'title'        => 'TailwindCSS Tips and Tricks',
                'slug'         => 'tailwindcss-tips-and-tricks',
                'category'     => 'Design',
                'color'        => '#06B6D4',
                'body'         => 'TailwindCSS is a utility-first CSS framework. This article shares best practices, component extraction techniques, and dark mode configuration.',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'tags'         => ['TailwindCSS', 'JavaScript'],
            ],
            [
                'title'        => 'Secure Your Laravel Application',
                'slug'         => 'secure-your-laravel-application',
                'category'     => 'Security',
                'color'        => '#F59E0B',
                'body'         => 'Security should never be an afterthought. This guide covers CSRF protection, SQL injection prevention, rate limiting, and role-based access control in Laravel.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'tags'         => ['Security', 'Laravel', 'PHP'],
            ],
            [
                'title'        => 'RESTful API Design Best Practices',
                'slug'         => 'restful-api-design-best-practices',
                'category'     => 'Technology',
                'color'        => '#10B981',
                'body'         => 'Designing a clean, consistent REST API is an art. We cover versioning, authentication with Sanctum, response formatting, and error handling.',
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'tags'         => ['API', 'Laravel', 'PHP'],
            ],
            [
                'title'        => 'Dockerising Your Laravel App',
                'slug'         => 'dockerising-your-laravel-app',
                'category'     => 'DevOps',
                'color'        => '#3B82F6',
                'body'         => 'Docker simplifies development environments and deployment pipelines. Learn how to containerise a Laravel application with Nginx, PHP-FPM, and MySQL.',
                'is_published' => false,
                'published_at' => null,
                'tags'         => ['DevOps', 'PHP'],
            ],
            [
                'title'        => 'Vue.js with Inertia and Laravel',
                'slug'         => 'vuejs-with-inertia-and-laravel',
                'category'     => 'Web Development',
                'color'        => '#22C55E',
                'body'         => 'InertiaJS acts as the glue between a server-side Laravel backend and a Vue.js frontend. This post explains how Inertia eliminates the need for a separate API layer.',
                'is_published' => false,
                'published_at' => null,
                'tags'         => ['Vue.js', 'JavaScript', 'Laravel'],
            ],
            [
                'title'        => 'Writing Tests for Your Laravel Application',
                'slug'         => 'writing-tests-for-your-laravel-application',
                'category'     => 'Laravel',
                'color'        => '#8B5CF6',
                'body'         => 'A well-tested application is a reliable application. We look at Pest PHP, feature tests, database factories, and mocking in a Laravel project.',
                'is_published' => true,
                'published_at' => now()->subHours(5),
                'tags'         => ['Testing', 'Laravel', 'PHP'],
            ],
            [
                'title'        => 'Database Optimisation in Laravel',
                'slug'         => 'database-optimisation-in-laravel',
                'category'     => 'Technology',
                'color'        => '#F97316',
                'body'         => 'Slow queries kill user experience. Explore eager loading, query caching with Redis, custom scopes, and database indexing strategies in Laravel.',
                'is_published' => true,
                'published_at' => now()->subHours(2),
                'tags'         => ['Database', 'Performance', 'Laravel'],
            ],
        ];

        foreach ($posts as $postData) {
            $category = Category::where('name', $postData['category'])->first();
            $tagNames = $postData['tags'];

            $post = Post::create([
                'title'        => $postData['title'],
                'slug'         => $postData['slug'],
                'category_id'  => $category?->id,
                'color'        => $postData['color'],
                'body'         => $postData['body'],
                'is_published' => $postData['is_published'],
                'published_at' => $postData['published_at'],
            ]);

            $tagIds = Tag::whereIn('name', $tagNames)->pluck('id');
            $post->tags()->sync($tagIds);
        }
    }
}

