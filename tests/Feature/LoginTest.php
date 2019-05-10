<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Testing validation for email field
     *
     * @return void
     */
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."]
                ]
            ]);
    }

    /**
     * Testing login success
     *
     * @return void
     */
    public function testUserLoginSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'test@mail.com',
            'password' => bcrypt('testing123')
        ]);

        $payload = ['email' => 'test@mail.com', 'password' => 'testing123'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
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
            ]);
    }
}
