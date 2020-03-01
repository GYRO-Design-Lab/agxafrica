<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Storage;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class StoreMarketTest extends TestCase
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
        $response = $this->json('POST', url('/companies/cuitcode/market'), [
            'photo' => $photo = UploadedFile::fake()->image('commodity.jpg'),
            'commodity' => 'cocoa',
            'specification' => null,
            'location' => 'nigeria',
            'price' => '4000',
            'quantity' => '500',
            'unit' => 'kg',
            'trade_type' => 'buy'
        ]);
        
        $response->dump();
        Storage::disk('local')->assertExists('market/cuitcode/commodities/' . $photo->getClientOriginalName());
        $response->assertStatus(302);
    }
}
