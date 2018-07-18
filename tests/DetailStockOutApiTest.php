<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailStockOutApiTest extends TestCase
{
    use MakeDetailStockOutTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDetailStockOut()
    {
        $detailStockOut = $this->fakeDetailStockOutData();
        $this->json('POST', '/api/v1/detailStockOuts', $detailStockOut);

        $this->assertApiResponse($detailStockOut);
    }

    /**
     * @test
     */
    public function testReadDetailStockOut()
    {
        $detailStockOut = $this->makeDetailStockOut();
        $this->json('GET', '/api/v1/detailStockOuts/'.$detailStockOut->id);

        $this->assertApiResponse($detailStockOut->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDetailStockOut()
    {
        $detailStockOut = $this->makeDetailStockOut();
        $editedDetailStockOut = $this->fakeDetailStockOutData();

        $this->json('PUT', '/api/v1/detailStockOuts/'.$detailStockOut->id, $editedDetailStockOut);

        $this->assertApiResponse($editedDetailStockOut);
    }

    /**
     * @test
     */
    public function testDeleteDetailStockOut()
    {
        $detailStockOut = $this->makeDetailStockOut();
        $this->json('DELETE', '/api/v1/detailStockOuts/'.$detailStockOut->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/detailStockOuts/'.$detailStockOut->id);

        $this->assertResponseStatus(404);
    }
}
