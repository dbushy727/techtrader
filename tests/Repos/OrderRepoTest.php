<?php

namespace Tests\Repos;

use Tests\TestBase;

class OrderRepoTest extends TestBase
{
    protected $repo;

    public function setUp()
    {
        parent::setUp();
        $this->repo = app('TechTrader\Repos\OrderRepo');
    }

    /** @test */
    public function it_can_set_order_to_paid()
    {
        $user = \DB::table('users')->first();

        $order_params = [
            'user_id' => $user->id,
            'subtotal' => 10,
            'tax' => 1,
            'total' => 11,
        ];

        $order = $this->repo->create($order_params);

        $this->assertNotTrue($order->is_paid);

        $updated_order = $this->repo->setToPaid($order->id);
        $this->assertEquals(1, $updated_order->is_paid);
    }
}
