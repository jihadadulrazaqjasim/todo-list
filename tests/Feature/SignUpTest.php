<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignUpTest extends TestCase
{

    public function test_user_signed_up_successfully(): void
    {
        $response = $this->postJson(route('signup'), [
            'name' => 'John Doe',
            'email' => 'jihad@gmail.com'
        ])->assertCreated()
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ]
        ]);
    }
}
