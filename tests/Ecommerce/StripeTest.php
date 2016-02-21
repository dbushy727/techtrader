<?php

namespace Tests\Ecommerce;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use TechTrader\Ecommerce\Stripe;
use TechTrader\Models\User;
use Tests\TestBase;

class StripeTest extends TestBase
{
    /** @test */
    public function it_can_charge_a_user()
    {
        // Get User
        $user = User::first();

        // Set payment data
        $payment_data = [
            'amount' => 20,
        ];

        // Setup payment provider
        $stripe = app('TechTrader\Ecommerce\Stripe');

        // Expected
        $expected = "Charged User {$user->id} to the amount of {$payment_data['amount']}";

        $payment = $stripe->charge($user, $payment_data);
        $this->assertEquals($expected, $payment);
    }
}
