<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:03
 */

 namespace Tests\Feature;

 use Illuminate\Foundation\Testing\WithFaker;
 use Tests\TestCase;
 use Core\User\Entity\Model\User;
 use Tymon\JWTAuth\Facades\JWTAuth;
 
 class TransactionTest extends TestCase
 {
    use WithFaker;

    protected function setUp(): void
    {
       parent::setUp();
       // Create and authenticate a new user for each test
       $token = JWTAuth::fromUser($this->createUser());
       $this->withHeader('Authorization', 'Bearer ' . $token);
    }

    private function createUser()
    {
       return User::create([
           'name' => $this->faker->name,
           'email' => $this->faker->unique()->safeEmail,
           'password' => bcrypt('password'),
       ]);
    }

    public function testGetVehicles()
    {
       $response = $this->get('/api/v1/vehicle?type=MotorCycle');
       $response->assertStatus(200);
    }

    public function testGetTransactions()
    {
       $response = $this->get('/api/v1/transaction?vehicle_id=64ec3b861559000094003826');
       $response->assertStatus(200);
    }
}