<?php

namespace Tests\Unit;

use Tests\TestCase;

class UpdateLiveMarketTest extends TestCase
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
        $response = $this->json('PUT', url('/live_market/1'), [
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
