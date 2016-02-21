<?php

namespace TechTrader\Ecommerce;

use TechTrader\Models\User;

class Stripe implements PaymentProcessor
{
    public function charge(User $user, array $params)
    {
        $amount = array_get($params, 'amount');

        return "Charged User {$user->id} to the amount of {$amount}";
    }
}
