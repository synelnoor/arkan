<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockInApiTest extends TestCase
{
    use MakeStockInTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStockIn()
    {
        $stockIn = $this->fakeStockInData();
        $this->json('POST', '/api/v1/stockIns', $stockIn);

        $this->assertApiResponse($stockIn);
    }

    /**
     * @test
     */
    public function testReadStockIn()
    {
        $stockIn = $this->makeStockIn();
        $this->json('GET', '/api/v1/stockIns/'.$stockIn->id);

        $this->assertApiResponse($stockIn->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStockIn()
    {
        $stockIn = $this->makeStockIn();
        $editedStockIn = $this->fakeStockInData();

        $this->json('PUT', '/api/v1/stockIns/'.$stockIn->id, $editedStockIn);

        $this->assertApiResponse($editedStockIn);
    }

    /**
     * @test
     */
    public function testDeleteStockIn()
    {
        $stockIn = $this->makeStockIn();
        $this->json('DELETE', '/api/v1/stockIns/'.$stockIn->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stockIns/'.$stockIn->id);

        $this->assertResponseStatus(404);
    }
}
