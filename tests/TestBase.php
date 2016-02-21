<?php

namespace Tests;

class TestBase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://techtrader.dev/';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();

        // Start a transaction so no tests actually affect database
        \DB::beginTransaction();
        \DB::connection()->disableQueryLog();
    }

    public function tearDown()
    {
        // When tests finish, rollback all queries
        \DB::rollback();
    }
}
