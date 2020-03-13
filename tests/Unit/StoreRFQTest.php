<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class StoreRFQTest extends TestCase
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
    public function store() {
        $this->authenticate();
        $response = $this->json('POST', url('/companies/cuitcode/rfq'), [
            'commodity' => 'beans',
            'category' => 'foodstuff',
            'specification' => 'special',
            'price' => '13000',
            'quantity' => '1',
            'delivery_location' => 'lokoja',
            'expiry' => '2020-12-03',
        ]);
        
        $response->dump();
        $response->assertStatus(302);
    }
}
