<?php

namespace Tests\Unit;

use Tests\TestCase;

class IndexLiveMarketTest extends TestCase
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
        $response = $this->json('GET', url('/warehouse/1/live_market'));
        
        $response->dump();
        $response->assertStatus(200);
    }
}
