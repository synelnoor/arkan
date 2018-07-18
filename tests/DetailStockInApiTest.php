<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailStockInApiTest extends TestCase
{
    use MakeDetailStockInTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDetailStockIn()
    {
        $detailStockIn = $this->fakeDetailStockInData();
        $this->json('POST', '/api/v1/detailStockIns', $detailStockIn);

        $this->assertApiResponse($detailStockIn);
    }

    /**
     * @test
     */
    public function testReadDetailStockIn()
    {
        $detailStockIn = $this->makeDetailStockIn();
        $this->json('GET', '/api/v1/detailStockIns/'.$detailStockIn->id);

        $this->assertApiResponse($detailStockIn->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDetailStockIn()
    {
        $detailStockIn = $this->makeDetailStockIn();
        $editedDetailStockIn = $this->fakeDetailStockInData();

        $this->json('PUT', '/api/v1/detailStockIns/'.$detailStockIn->id, $editedDetailStockIn);

        $this->assertApiResponse($editedDetailStockIn);
    }

    /**
     * @test
     */
    public function testDeleteDetailStockIn()
    {
        $detailStockIn = $this->makeDetailStockIn();
        $this->json('DELETE', '/api/v1/detailStockIns/'.$detailStockIn->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/detailStockIns/'.$detailStockIn->id);

        $this->assertResponseStatus(404);
    }
}
