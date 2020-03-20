<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class GetTradeSalesTest extends TestCase
{
    private function authenticate() {
        $this->json('POST', route('login'),[
            'email' => 'quad.lasisi@gmail.com',
            'password' => 'agx-Secret',
        ]);
    }

    /**
     * @test
     */
    public function investments() {
        $this->authenticate();
        $response = $this->json('GET', url('/cuitcode/trade-sales'));
        
        $response->dump();
        $response->assertStatus(200);
    }
}
