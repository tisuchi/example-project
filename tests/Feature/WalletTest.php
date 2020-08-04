<?php

namespace Tests\Feature;

use App\User;
use App\Wallet;
use App\WalletType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WalletTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_able_to_see_the_list_of_the_wallet()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $wallets = factory(Wallet::class, 10)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->get(route('wallets.index'));

        $response->assertStatus(200)
            ->assertSee($wallets[0]->title);
    }

    /** @test */
    public function a_user_can_able_to_see_the_new_wallet_create_form()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('wallets.create'));

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_able_to_create_a_new_wallet()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $wallet = [
            'user_id' => $user->id,
            'title' => 'Credit Card',
            'type_id' => factory(WalletType::class)->create()->id,
            'total' => 1000
        ];

        $response = $this->actingAs($user)
            ->post(route('wallets.store'), $wallet);

        $response->assertStatus(302)
            ->assertSessionHas('success');
    }
}
