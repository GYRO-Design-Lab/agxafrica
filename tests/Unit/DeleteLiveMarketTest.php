<?php

namespace Tests\Unit;

use Tests\TestCase;

class DeleteLiveMarketTest extends TestCase
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
        $response = $this->json('DELETE', url('/live_market/1'));
        
        $response->dump();
        $response->assertStatus(302);
    }
}
