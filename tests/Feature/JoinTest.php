<?php

namespace Tests\Feature;

use App\Notifications\RegularUserJoined;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Tests\TestCase;

class JoinTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_visitor_can_able_to_see_the_join_page()
    {
        $response = $this->get(route('join.show'));

        $response->assertStatus(200);
    }

    /** @test */
    public function a_visitor_can_able_to_join()
    {
        Notification::fake();

        $this->withoutExceptionHandling();

        $newUser = [
            'email' => 'test@ucraft.com',
            'password' => bcrypt('password'),
        ];

        $response = $this->post(route('join.store'), $newUser);

        Notification::assertSentTo(User::latest()->first(), RegularUserJoined::class);

        $response->assertStatus(302)
            ->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'email' => $newUser['email']
        ]);
    }

    /** @test */
    public function a_recently_joined_user_can_verify_their_email()
    {
        $this->withoutExceptionHandling();

        $token = Str::random();

        factory(User::class)->create([
            'remember_token' => $token
        ]);

        $response = $this->get(route('verify.email', $token));

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'remember_token' => $token
        ]);
    }
}
