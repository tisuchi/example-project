<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_visitor_can_able_to_see_the_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    /** @test */
    public function a_visitor_can_not_able_to_login_with_wrong_credentials()
    {
        $userData = [
            'email' => 'test@ucraft.com',
            'password' => bcrypt('password'),
        ];

        $response = $this->post(route('login.store'), $userData);

        $response->assertStatus(302)
            ->assertSessionHas('danger');
    }

    /** @test */
    public function a_visitor_can_able_to_login_with_right_credentials()
    {
        $this->withoutExceptionHandling();

        $userData = [
            'email' => 'test@ucraft.com',
            'password' => bcrypt('password'),
        ];

        $user = factory(User::class)->create($userData);

        $response = $this->actingAs($user)->post(route('login.store'), $userData);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }
}
