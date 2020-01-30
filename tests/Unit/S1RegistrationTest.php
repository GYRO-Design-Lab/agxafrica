<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class S1RegistrationTest extends TestCase
{
    /**
     * @test
     */

    public function register() {
        $commodities = [
            'software' => [],
            'hardware' => [],
            'consultancy' => []
        ];

        $response = $this->json('POST', url('/register'),[
            'full_name' => 'Quadri Lasisi',
            'email' => 'quad.lasisi@gmail.com',
            'phone' => '08081285396',
            'company_name' => 'Cuitcode',
            'company_address' => 'Iju Aga',
            'commodities' => $commodities,
        ]);
        $response->dump();
        $response->assertStatus(302);
    }
}
