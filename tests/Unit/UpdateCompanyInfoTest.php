<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UpdateCompanyInfoTest extends TestCase
{
    /**
     * @test
     */
    public function update() {
        $commodities = [
            'software' => ['export', 300],
            'hardware' => ['export', 300],
            'consultancy' => ['import', 142]
        ];

        $response = $this->json('PUT', url('/companies/cuitcode'),[
            'cac_reg' => 'RC1234',
            'nepc_reg' => '45AR0',
            'contact_person' => 'Quadri',
            'contact_phone' => '08081285386',
            'contact_email' => 'quad.lasisi@gmail.com',
            'commodities' => $commodities,
        ]);
        $response->dump();
        $response->assertStatus(302);
    }
}
