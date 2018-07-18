<?php

use App\Models\StockIn;
use App\Repositories\StockInRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockInRepositoryTest extends TestCase
{
    use MakeStockInTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockInRepository
     */
    protected $stockInRepo;

    public function setUp()
    {
        parent::setUp();
        $this->stockInRepo = App::make(StockInRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStockIn()
    {
        $stockIn = $this->fakeStockInData();
        $createdStockIn = $this->stockInRepo->create($stockIn);
        $createdStockIn = $createdStockIn->toArray();
        $this->assertArrayHasKey('id', $createdStockIn);
        $this->assertNotNull($createdStockIn['id'], 'Created StockIn must have id specified');
        $this->assertNotNull(StockIn::find($createdStockIn['id']), 'StockIn with given id must be in DB');
        $this->assertModelData($stockIn, $createdStockIn);
    }

    /**
     * @test read
     */
    public function testReadStockIn()
    {
        $stockIn = $this->makeStockIn();
        $dbStockIn = $this->stockInRepo->find($stockIn->id);
        $dbStockIn = $dbStockIn->toArray();
        $this->assertModelData($stockIn->toArray(), $dbStockIn);
    }

    /**
     * @test update
     */
    public function testUpdateStockIn()
    {
        $stockIn = $this->makeStockIn();
        $fakeStockIn = $this->fakeStockInData();
        $updatedStockIn = $this->stockInRepo->update($fakeStockIn, $stockIn->id);
        $this->assertModelData($fakeStockIn, $updatedStockIn->toArray());
        $dbStockIn = $this->stockInRepo->find($stockIn->id);
        $this->assertModelData($fakeStockIn, $dbStockIn->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStockIn()
    {
        $stockIn = $this->makeStockIn();
        $resp = $this->stockInRepo->delete($stockIn->id);
        $this->assertTrue($resp);
        $this->assertNull(StockIn::find($stockIn->id), 'StockIn should not exist in DB');
    }
}
