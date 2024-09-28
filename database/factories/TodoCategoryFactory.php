<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TodoCategory>
 */
class TodoCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'todo_id' => Todo::query()->inRandomOrder()->first()->user_id,
            'category_id' => Category::query()->inRandomOrder()->first()->id,
        ];
    }
}
