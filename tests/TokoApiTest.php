<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TokoApiTest extends TestCase
{
    use MakeTokoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateToko()
    {
        $toko = $this->fakeTokoData();
        $this->json('POST', '/api/v1/tokos', $toko);

        $this->assertApiResponse($toko);
    }

    /**
     * @test
     */
    public function testReadToko()
    {
        $toko = $this->makeToko();
        $this->json('GET', '/api/v1/tokos/'.$toko->id);

        $this->assertApiResponse($toko->toArray());
    }

    /**
     * @test
     */
    public function testUpdateToko()
    {
        $toko = $this->makeToko();
        $editedToko = $this->fakeTokoData();

        $this->json('PUT', '/api/v1/tokos/'.$toko->id, $editedToko);

        $this->assertApiResponse($editedToko);
    }

    /**
     * @test
     */
    public function testDeleteToko()
    {
        $toko = $this->makeToko();
        $this->json('DELETE', '/api/v1/tokos/'.$toko->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tokos/'.$toko->id);

        $this->assertResponseStatus(404);
    }
}
