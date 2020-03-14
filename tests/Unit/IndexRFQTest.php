<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class IndexRFQTest extends TestCase
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
    public function index() {
        $this->authenticate();
        $response = $this->json('GET', url('/companies/cuitcode/rfq'));
        
        $response->dump();
        $response->assertStatus(200);
    }
}
