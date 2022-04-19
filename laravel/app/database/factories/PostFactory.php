<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'body' => $this->faker->text(),
            'image_path' => '/storage/images/UtYFtG6kZMbLWes38744sORzAQOAv6xtWJbsG7xI.jpg',
            'title' => $this->faker->words(3, true),
        ];
    }
}
