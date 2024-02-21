<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $food = Category::create([
            'name' => 'Food',
            'slug' => 'food'
        ]);

        $laravel = Category::create([
            'name' => 'Laravel',
            'slug' => 'laravel'
        ]);

        $hobby = Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);

        $job = Category::create([
            'name' => 'Job',
            'slug' => 'Job'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $food->id,
            'title' => 'My Food Post',
            'slug' => 'my-food-post',
            'exerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',

        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $laravel->id,
            'title' => 'Laravel Updates',
            'slug' => 'laravel-updates',
            'exerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'Interesting Hobbies',
            'slug' => 'interesting-hobbies',
            'exerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',

        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $job->id,
            'title' => 'Job Post',
            'slug' => 'job-post',
            'exerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',

        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}