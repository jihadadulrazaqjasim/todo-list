<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'firstname' => 'Jihad',
            'lastname' => 'Abdulrazzaq',
            'email' => 'jihad@gmail.com',
        ]);

        User::factory()->create([
            'firstname' => 'Nazli',
            'lastname' => 'Jawad',
            'email' => 'nazli@gmail.com',
        ]);

        User::factory()->create([
            'firstname' => 'Banaz',
            'lastname' => 'Sleman',
            'email' => 'banaz@gmail.com']);

        User::factory()->create([
            'firstname' => 'Soma',
            'lastname' => 'Ali',
            'email' => 'soma@gmail.com']);

//        User::factory(10)->create();
    }
}
