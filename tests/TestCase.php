<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

    use CreatesApplication;

    protected function setUp(): void
    {

        parent::setUp();

        Artisan::call('migrate:fresh', ['--seed' => true]);

    }

    public function post($uri, array $data = [], array $headers = [])
    {
        return parent::post($uri, $data, array_merge($headers, [
            "accept" => "application/json"
        ]));
    }

}
