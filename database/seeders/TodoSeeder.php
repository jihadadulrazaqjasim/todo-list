<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{

    public function run(): void
    {
        foreach (User::all() as $user) {
           $user->todos()->saveMany(Todo::factory(20)->make());
        }
//        Todo::factory(20)->create();
    }
}
