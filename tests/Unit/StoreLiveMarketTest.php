<?php

namespace Tests\Unit;

use Storage;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class StoreLiveMarketTest extends TestCase
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
        $response = $this->json('POST', url('/warehouse/1/live_market'), [
            'photo' => $photo = UploadedFile::fake()->image('live_commodity.jpg'),
            'commodity' => 'palm',
            'specification' => null,
            'location' => 'burundi',
            'price' => '4000',
            'quantity' => '500',
            'unit' => 'kg',
        ]);
        
        $response->dump();
        Storage::disk('local')->assertExists('warehouses/cuitcode/1/live_commodities/' . $photo->getClientOriginalName());
        $response->assertStatus(302);
    }
}
