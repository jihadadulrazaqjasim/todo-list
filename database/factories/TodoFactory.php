<?php

namespace Database\Factories;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'priority' => $this->faker->randomElement(TaskPriority::getValues()),
            'status' => $this->faker->randomElement(TaskStatus::getValues()),
            'due_date' => $this->faker->dateTime,
            'user_id' => User::query()->inRandomOrder()->first()->id,

        ];
    }

    public function configure(): TodoFactory|Factory
    {
        return $this->afterCreating(function (Todo $todo) {
            $categories = Category::query()->inRandomOrder()->take(rand(1, 3))->pluck('id');
            $todo->categories()->attach($categories);
        });
    }
}
