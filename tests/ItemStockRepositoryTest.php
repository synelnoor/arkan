<?php

use App\Models\ItemStock;
use App\Repositories\ItemStockRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemStockRepositoryTest extends TestCase
{
    use MakeItemStockTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ItemStockRepository
     */
    protected $itemStockRepo;

    public function setUp()
    {
        parent::setUp();
        $this->itemStockRepo = App::make(ItemStockRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateItemStock()
    {
        $itemStock = $this->fakeItemStockData();
        $createdItemStock = $this->itemStockRepo->create($itemStock);
        $createdItemStock = $createdItemStock->toArray();
        $this->assertArrayHasKey('id', $createdItemStock);
        $this->assertNotNull($createdItemStock['id'], 'Created ItemStock must have id specified');
        $this->assertNotNull(ItemStock::find($createdItemStock['id']), 'ItemStock with given id must be in DB');
        $this->assertModelData($itemStock, $createdItemStock);
    }

    /**
     * @test read
     */
    public function testReadItemStock()
    {
        $itemStock = $this->makeItemStock();
        $dbItemStock = $this->itemStockRepo->find($itemStock->id);
        $dbItemStock = $dbItemStock->toArray();
        $this->assertModelData($itemStock->toArray(), $dbItemStock);
    }

    /**
     * @test update
     */
    public function testUpdateItemStock()
    {
        $itemStock = $this->makeItemStock();
        $fakeItemStock = $this->fakeItemStockData();
        $updatedItemStock = $this->itemStockRepo->update($fakeItemStock, $itemStock->id);
        $this->assertModelData($fakeItemStock, $updatedItemStock->toArray());
        $dbItemStock = $this->itemStockRepo->find($itemStock->id);
        $this->assertModelData($fakeItemStock, $dbItemStock->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteItemStock()
    {
        $itemStock = $this->makeItemStock();
        $resp = $this->itemStockRepo->delete($itemStock->id);
        $this->assertTrue($resp);
        $this->assertNull(ItemStock::find($itemStock->id), 'ItemStock should not exist in DB');
    }
}
