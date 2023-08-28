<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Core\User\Entity\Model\User;

class AuthorizationTest extends TestCase
{
    use WithFaker;

    /**
     * Test user registration with valid payload.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $name = $this->faker->name;
        $email = $this->faker->unique()->safeEmail;
        $password = 'RandomPass123';

        $registerResponse = $this->post('/api/v1/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $registerResponse->assertStatus(201);
        // Add more assertions here for the registration response structure

        // Test successful user login with valid credentials.
        $this->testSuccessLogin($email, $password);
    }

    /**
     * Test user registration with missing payload keys.
     *
     * @return void
     */
    public function testMissingPayloadKeys()
    {
        $response = $this->post('/api/v1/register', []);

        $response->assertStatus(422);
    }

    /**
     * Test failed user login with incorrect credentials.
     *
     * @return void
     */
    public function testFailedLogin()
    {
        $response = $this->post('/api/v1/login', [
            'email' => 'nonexistent@test.com',
            'password' => 'InvalidPassword',
        ]);

        $response->assertStatus(404);
    }

    /**
     * Test failed user login with invalid credentials.
     *
     * @return void
     */
    public function testInvalidLogin()
    {
        $email = $this->faker->name;

        $response = $this->post('/api/v1/login', [
            'email' => $email,
            'password' => 'InvalidPassword',
        ]);

        $response->assertStatus(422);
    }

    /**
     * Test user login with missing payload keys.
     *
     * @return void
     */
    public function testMissingLoginPayloadKeys()
    {
        $response = $this->post('/api/v1/login', []);

        $response->assertStatus(422);
    }

    /**
     * Test successful user login.
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    private function testSuccessLogin($email, $password)
    {
        $response = $this->post('/api/v1/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
    }
}
