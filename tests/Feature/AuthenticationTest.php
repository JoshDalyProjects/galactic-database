<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\RequestGuard;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_register()
    {
        $response = $this->postJson('api/register', ['name' => 'Fish', 'email' => 'fish@fish.com', 'password' => 'melons23']);

        $response->assertStatus(200)->assertSee(['name' => 'Fish']);
    }

    public function test_login() {
        $user = User::factory()->create();

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);
    }

    public function test_unauthorized_login()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(401)
            ->assertJson([
                "message" => "Unauthorized"
            ]);
    }

    public function test_logout() {
        $response = $this->json('POST', 'api/logout')
        ->assertStatus(200)
        ->assertJson(["message" => "You have successfully logged out and the token was revoked"]);
    }


}
