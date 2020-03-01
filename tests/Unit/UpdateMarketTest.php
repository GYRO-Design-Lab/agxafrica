<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UpdateMarketTest extends TestCase
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
    public function update() {
        $this->authenticate();
        $response = $this->json('PUT', url('/market/6'), [
            'specification' => null,
            'location' => 'germany',
            'price' => '423050',
            'quantity' => '670',
            'unit' => 'kg',
        ]);
        
        $response->dump();
        $response->assertStatus(302);
    }
}
