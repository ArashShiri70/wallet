<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GatewayControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->getJson('/api/v1/gateways');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "gateways" => [
                        "*" => [
                            "id",
                            "name",
                            "api_key",
                            "username",
                            "password",
                            "transaction_fee_deposit",
                            "transaction_fee_withdraw",
                            "transaction_tax",
                            "status",
                            "created_at",
                            "updated_at"
                        ]
                    ]
                ]
            ])
        ;
    }
}
