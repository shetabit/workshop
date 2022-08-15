<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_new_user_data_is_validated()
    {
        $response = $this->post('/users', [
            'name' => '',
            'email' => 'not_email_format',
            'password' => '123456',
            'password_confirmation' => '456789',
        ]);

        $response->assertStatus(302)
            ->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_new_user_can_be_added()
    {
        $response = $this->post('/users', [
            'name' => 'Gaurav',
            'email' => 'gauravmakhecha@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertRedirect('/')
            ->assertSessionHas('success', 'User created successfully.');

        $this->assertDatabaseHas('users', [
            'name' => 'Gaurav',
            'email' => 'gauravmakhecha@gmail.com',
        ]);
    }
}
