<?php

namespace Tests\Feature;

use App\User;
use App\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_able_to_see_reports()
    {
        $user = factory(User::class)->create();

        factory(Wallet::class, 4)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->get(route('reports.index'));

        $response->assertStatus(200);
    }
}
