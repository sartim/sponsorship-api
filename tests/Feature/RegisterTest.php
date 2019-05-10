<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Testing user registration success
     *
     * @return void
     */
    public function testsRegistersSuccessfully()
    {
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@mail.com',
            'phone' => '123456789',
            'password' => 'testing123',
            'password_confirmation' => 'testing123',
            'is_active' => true,
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone',
                    // 'password',
                    'is_active',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);;
    }

    /**
     * Testing validation for first_name, last_name, email & password
     *
     * @return void
     */
    public function testsRequiresPasswordEmailAndName()
    {
        $this->json('post', '/api/register')
            ->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'email' => ['The email field is required.'],
                    'first_name' => ['The first name field is required.'],
                    'last_name' => ['The last name field is required.'],
                    'is_active' => ['The is active field is required.'],
                    'password' => ['The password field is required.'],
                    'phone' => ['The phone field is required.']
                ],
                'message' => 'The given data was invalid.'
            ]);
    }

    /**
     * Testing validation for password confirmation
     *
     * @return void
     */
    public function testsRequirePasswordConfirmation()
    {
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@mail.com',
            'phone' => '123456789',
            'password' => 'testing123',
            'is_active' => true,
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(422)
            ->assertJson(
                [
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        "password" => ["The password confirmation does not match."]
                    ]
                ]);
    }
}
