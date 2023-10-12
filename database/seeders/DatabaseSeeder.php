<?php

namespace Database\Seeders;


use App\Models\Article;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Subscription::factory()
            ->count(3)
            ->has(User::factory()
                ->has(Article::factory()->count(3))
                ->count(1)
            )
            ->create();


    }
}
