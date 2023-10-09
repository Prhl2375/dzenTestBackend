<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parentId = fake()->boolean(50) ? 0 : Post::inRandomOrder()->first()->id;
        $timestamp = fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');
        return [
            'name'=>fake()->name,
            'email'=>fake()->email,
            'avatar'=>fake()->imageUrl(96,96),
            'title'=>fake()->sentence,
            'text'=>fake()->text,
            'created_at'=>$timestamp,
            'updated_at'=>$timestamp,
            'parent_id'=>$parentId,
        ];
    }
}
