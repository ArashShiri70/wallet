<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Mockery;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_users_endpoint_returns_user_list(): void
    {
        User::factory()->count(10)->create();

        $response = $this->getJson('/api/v1/users');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "users" => [
                        "*" => [
                            "id",
                            "name",
                            "email",
                            "phone_number"
                        ]
                    ]
                ],
                "message"
            ])
            ->assertJsonCount(10, 'data.users')
        ;
    }

//    public function test_users_endpoint_handle_errors()
//    {
//        // todo: exception test
//        $mockUser = Mockery::mock(User::class);
//        $mockUser->shouldReceive('all')->once()->andThrow(new \Exception('Database Error'));
//
//        $response = $this->getJson('/api/v1/users');
//
//        $response
//            ->assertStatus(500)
//            ->assertJson([
//                "data" => [],
//                "message" => "Something went wrong"
//            ])
//        ;
//    }
}
