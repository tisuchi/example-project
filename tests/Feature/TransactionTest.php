<?php

namespace Tests\Feature;

use App\TransactionType;
use App\User;
use App\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_able_see_the_top_up_form()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $wallet = factory(Wallet::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->get(route('topup.create', $wallet->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_able_to_top_up_to_a_speific_wallet()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $wallet = factory(Wallet::class)->create([
            'user_id' => $user->id
        ]);

        $transactionType = factory(TransactionType::class)->create();

        $data = [
            'wallet_id' => $wallet->id,
            'amount' => 100,
            'transaction_type_id' => $transactionType->id,
        ];

        $response = $this->actingAs($user)
            ->post(route('topup.store', $wallet->id), $data);

        $response->assertStatus(302)
            ->assertSessionHas('success');

        $this->assertDatabaseHas('wallets', [
            'total' => $wallet->total + $data['amount']
        ]);
    }
}
