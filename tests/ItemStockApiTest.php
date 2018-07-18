<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemStockApiTest extends TestCase
{
    use MakeItemStockTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateItemStock()
    {
        $itemStock = $this->fakeItemStockData();
        $this->json('POST', '/api/v1/itemStocks', $itemStock);

        $this->assertApiResponse($itemStock);
    }

    /**
     * @test
     */
    public function testReadItemStock()
    {
        $itemStock = $this->makeItemStock();
        $this->json('GET', '/api/v1/itemStocks/'.$itemStock->id);

        $this->assertApiResponse($itemStock->toArray());
    }

    /**
     * @test
     */
    public function testUpdateItemStock()
    {
        $itemStock = $this->makeItemStock();
        $editedItemStock = $this->fakeItemStockData();

        $this->json('PUT', '/api/v1/itemStocks/'.$itemStock->id, $editedItemStock);

        $this->assertApiResponse($editedItemStock);
    }

    /**
     * @test
     */
    public function testDeleteItemStock()
    {
        $itemStock = $this->makeItemStock();
        $this->json('DELETE', '/api/v1/itemStocks/'.$itemStock->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/itemStocks/'.$itemStock->id);

        $this->assertResponseStatus(404);
    }
}
