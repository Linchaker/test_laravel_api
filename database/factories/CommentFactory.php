<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $posts = \App\Models\Post::pluck('id')->toArray();
        return [
            'post_id' => $this->faker->randomElement($posts),
            'commentator_id' => $this->faker->randomElement($users),
            'content' => $this->faker->text(100),
            'deleted_at' => mt_rand(0, 5) === 0 ? $this->faker->dateTime() : null,
        ];
    }
}
