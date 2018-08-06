<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogStockApiTest extends TestCase
{
    use MakeLogStockTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLogStock()
    {
        $logStock = $this->fakeLogStockData();
        $this->json('POST', '/api/v1/logStocks', $logStock);

        $this->assertApiResponse($logStock);
    }

    /**
     * @test
     */
    public function testReadLogStock()
    {
        $logStock = $this->makeLogStock();
        $this->json('GET', '/api/v1/logStocks/'.$logStock->id);

        $this->assertApiResponse($logStock->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLogStock()
    {
        $logStock = $this->makeLogStock();
        $editedLogStock = $this->fakeLogStockData();

        $this->json('PUT', '/api/v1/logStocks/'.$logStock->id, $editedLogStock);

        $this->assertApiResponse($editedLogStock);
    }

    /**
     * @test
     */
    public function testDeleteLogStock()
    {
        $logStock = $this->makeLogStock();
        $this->json('DELETE', '/api/v1/logStocks/'.$logStock->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/logStocks/'.$logStock->id);

        $this->assertResponseStatus(404);
    }
}
