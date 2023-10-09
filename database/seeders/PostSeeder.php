<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'name'=>fake()->name,
            'email'=>fake()->email,
            'avatar'=>fake()->imageUrl(96,96),
            'title'=>fake()->sentence(),
            'text'=>fake()->text,
            'parent_id'=>0,
        ]);
        for ($i = 0; $i<124; $i++){
            Post::factory()->create();
        }
    }
}
