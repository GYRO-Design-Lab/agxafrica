<?php

namespace Tests\Unit;

use Tests\TestCase;

class EditLiveMarketTest extends TestCase
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
        $response = $this->json('GET', url('/live_market/2/edit'));
        
        $response->dump();
        $response->assertStatus(200);
    }
}
