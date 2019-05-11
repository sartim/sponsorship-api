<?php

namespace Tests\Feature;

use App\Child;
use App\Gender;
use App\User;
use Tests\TestCase;

class ChildTest extends TestCase
{
    /**
     * Testing child created correctly
     *
     * @return void
     */
    public function testChildCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'date_of_birth' => '1997-10-01',
            'gender_id' => 1,
        ];

        $this->json('POST', '/api/child', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '1997-10-01',
                'gender_id' => 1,
                ]);
    }

    /**
     * Testing child updated correctly
     *
     * @return void
     */
    public function testsChildUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $gender = factory(Gender::class)->create();
        $child = factory(Child::class)->create([
            'first_name' => 'Test',
            'last_name' => 'Child',
            'date_of_birth' => '1997-04-01',
            'gender_id' => 1,
        ]);

        $payload = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'date_of_birth' => '1997-11-01',
            'gender_id' => 2,
        ];

        $response = $this->json('PUT', '/api/child/' . $child->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 4,
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'date_of_birth' => '1997-11-01',
                'gender_id' => 2,
            ]);
    }

    /**
     * Testing child deleted correctly
     *
     * @return void
     */
    public function testsChildDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $child = factory(Child::class)->create([
            'first_name' => 'Test',
            'last_name' => 'Child',
            'date_of_birth' => '1997-04-01',
            'gender_id' => 1,
        ]);

        $this->json('DELETE', '/api/child/' . $child->id, [], $headers)
            ->assertStatus(204);
    }

    /**
     * Testing children listed correctly
     * @return void
     */
    public function testChildrenListedCorrectly()
    {
        factory(Child::class)->create([
            'first_name' => 'Test',
            'last_name' => 'Child1',
            'date_of_birth' => '1997-04-01',
            'gender_id' => 1,
        ]);

        factory(Child::class)->create([
            'first_name' => 'Test',
            'last_name' => 'Child2',
            'date_of_birth' => '1996-04-01',
            'gender_id' => 2,
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/child', [], $headers)
            ->assertStatus(200)
            ->assertJsonFragment(
                [
                    'first_name' => 'Test',
                    'last_name' => 'Child1',
                    'date_of_birth' => '1997-04-01',
                ],
                [
                    'first_name' => 'Test',
                    'last_name' => 'Child2',
                    'date_of_birth' => '1996-04-01'
                ]
            )
            ->assertJsonStructure([
                '*' => ['id', 'first_name', 'last_name', 'date_of_birth', 'gender_id','created_at', 'updated_at'],
            ]);
    }
}
