<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $users = \App\Models\User::factory(250)->create();

        // \App\Models\Feature::factory(60)->create()->each(function ($feature) use ($users) {
        //     $feature->comments()->createMany(Comment::factory(rand(1, 50))->make()->each(function ($comment) use ($users) {
        //         $comment->user_id = $users->random()->id;
        //     })->toArray());
        // });

        $users = User::factory(250)->create();

        Feature::factory(60)->create()->each(function ($feature) use ($users) {
            $feature->comments()->createMany(
                Comment::factory(rand(1, 50))->make()->each(function ($comment) use ($users) {
                    $comment->user_id = $users->random()->id;
                })->toArray()
            );
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
