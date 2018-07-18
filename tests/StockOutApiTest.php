<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockOutApiTest extends TestCase
{
    use MakeStockOutTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStockOut()
    {
        $stockOut = $this->fakeStockOutData();
        $this->json('POST', '/api/v1/stockOuts', $stockOut);

        $this->assertApiResponse($stockOut);
    }

    /**
     * @test
     */
    public function testReadStockOut()
    {
        $stockOut = $this->makeStockOut();
        $this->json('GET', '/api/v1/stockOuts/'.$stockOut->id);

        $this->assertApiResponse($stockOut->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStockOut()
    {
        $stockOut = $this->makeStockOut();
        $editedStockOut = $this->fakeStockOutData();

        $this->json('PUT', '/api/v1/stockOuts/'.$stockOut->id, $editedStockOut);

        $this->assertApiResponse($editedStockOut);
    }

    /**
     * @test
     */
    public function testDeleteStockOut()
    {
        $stockOut = $this->makeStockOut();
        $this->json('DELETE', '/api/v1/stockOuts/'.$stockOut->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stockOuts/'.$stockOut->id);

        $this->assertResponseStatus(404);
    }
}
