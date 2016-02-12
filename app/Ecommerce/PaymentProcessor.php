<?php

namespace TechTrader\Ecommerce;

interface PaymentProcessor
{
    public function charge(User $user, $total);
}