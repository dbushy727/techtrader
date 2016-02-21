<?php

namespace TechTrader\Ecommerce;

use TechTrader\Models\User;

interface PaymentProcessor
{
    public function charge(User $user, array $params);
}
