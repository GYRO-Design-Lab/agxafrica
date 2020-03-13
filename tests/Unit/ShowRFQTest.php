<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ShowRFQTest extends TestCase
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
    public function show() {
        $this->authenticate();
        $response = $this->json('GET', url('/rfq/1'));
        
        $response->dump();
        $response->assertStatus(200);
    }
}
