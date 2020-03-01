<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Storage;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class StoreWarehouseTest extends TestCase
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
        $response = $this->json('POST', url('/companies/cuitcode/warehouse'), [
            'photo' => $photo = UploadedFile::fake()->image('identity.jpg'),
            'name' => 'OFarms',
            'address' => 'ibafo, ogun state',
            'manager' => 'jossy',
            'contact_person' => 'jossy noni',
            'email' => 'jossy@agx.com',
            'phone' => '01-809581',
            'size' => '10 acres',
            'capacity' => '50MT',
        ]);
        
        $response->dump();
        Storage::disk('local')->assertExists('warehouses/cuitcode/identity/' . $photo->getClientOriginalName());
        $response->assertStatus(302);
    }
}
