<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Database\Seeder;

class TodoCategorySeeder extends Seeder
{
    public function run(): void
    {
        $todos = Todo::all();
        foreach ($todos as $todo) {
            $categories = Category::query()->inRandomOrder()->take(rand(1, 2))->pluck('id');
            $todo->categories()->attach($categories);
        }
    }
}
