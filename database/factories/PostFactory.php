<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $images = \App\Models\Image::pluck('id')->toArray();
        return [
            'author_id' => $this->faker->randomElement($users),
            'image_id' => $this->faker->randomElement($images),
            'content' => $this->faker->text(),
            'deleted_at' => mt_rand(0, 5) === 0 ? $this->faker->dateTime() : null,
        ];
    }
}
