<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
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
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(1846, 1231, 'animals', true),
            'category_id' => Category::all()->random()->id,
            'user_id' => \Filament\Models\User::all()->random()->id,
        ];
    }
}
