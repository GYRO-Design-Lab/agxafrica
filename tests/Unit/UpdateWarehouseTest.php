<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UpdateWarehouseTest extends TestCase
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
        $response = $this->json('PUT', url('/warehouse/1'), [
            'manager' => 'new jossy',
            'contact_person' => 'jossy noni',
            'email' => 'jossy@agx.com',
            'phone' => '01-809581',
            'size' => '10 acres',
            'capacity' => '53MT',
        ]);
        
        $response->dump();
        $response->assertStatus(302);
    }
}
