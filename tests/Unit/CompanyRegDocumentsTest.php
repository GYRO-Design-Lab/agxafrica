<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Storage;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class CompanyRegDocumentsTest extends TestCase
{
    /**
     * @test
     */
    public function upload() {
        $response = $this->json('POST', url('/companies/cuitcode/reg_documents'), [
            'cac_certificate' => $cac_c = UploadedFile::fake()->image('cac_cert.jpg'),
            'nepc_certificate' => $nepc = UploadedFile::fake()->image('nepc_cert.jpg'),
            'cac_1_1' => $cac_1 = UploadedFile::fake()->image('cac_1_1.jpg'),
            'memart' => $memart = UploadedFile::fake()->image('memart.jpg'),
        ]);
        
        $response->dump();
        Storage::disk('local')->assertExists('reg_documents/cuitcode/' . $cac_c->getClientOriginalName());
        Storage::disk('local')->assertExists('reg_documents/cuitcode/' . $nepc->getClientOriginalName());
        Storage::disk('local')->assertExists('reg_documents/cuitcode/' . $cac_1->getClientOriginalName());
        Storage::disk('local')->assertExists('reg_documents/cuitcode/' . $memart->getClientOriginalName());
        $response->assertStatus(302);
    }
}
