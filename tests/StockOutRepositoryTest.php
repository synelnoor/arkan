<?php

use App\Models\StockOut;
use App\Repositories\StockOutRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockOutRepositoryTest extends TestCase
{
    use MakeStockOutTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockOutRepository
     */
    protected $stockOutRepo;

    public function setUp()
    {
        parent::setUp();
        $this->stockOutRepo = App::make(StockOutRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStockOut()
    {
        $stockOut = $this->fakeStockOutData();
        $createdStockOut = $this->stockOutRepo->create($stockOut);
        $createdStockOut = $createdStockOut->toArray();
        $this->assertArrayHasKey('id', $createdStockOut);
        $this->assertNotNull($createdStockOut['id'], 'Created StockOut must have id specified');
        $this->assertNotNull(StockOut::find($createdStockOut['id']), 'StockOut with given id must be in DB');
        $this->assertModelData($stockOut, $createdStockOut);
    }

    /**
     * @test read
     */
    public function testReadStockOut()
    {
        $stockOut = $this->makeStockOut();
        $dbStockOut = $this->stockOutRepo->find($stockOut->id);
        $dbStockOut = $dbStockOut->toArray();
        $this->assertModelData($stockOut->toArray(), $dbStockOut);
    }

    /**
     * @test update
     */
    public function testUpdateStockOut()
    {
        $stockOut = $this->makeStockOut();
        $fakeStockOut = $this->fakeStockOutData();
        $updatedStockOut = $this->stockOutRepo->update($fakeStockOut, $stockOut->id);
        $this->assertModelData($fakeStockOut, $updatedStockOut->toArray());
        $dbStockOut = $this->stockOutRepo->find($stockOut->id);
        $this->assertModelData($fakeStockOut, $dbStockOut->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStockOut()
    {
        $stockOut = $this->makeStockOut();
        $resp = $this->stockOutRepo->delete($stockOut->id);
        $this->assertTrue($resp);
        $this->assertNull(StockOut::find($stockOut->id), 'StockOut should not exist in DB');
    }
}
