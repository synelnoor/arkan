<?php

use App\Models\LogStock;
use App\Repositories\LogStockRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogStockRepositoryTest extends TestCase
{
    use MakeLogStockTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogStockRepository
     */
    protected $logStockRepo;

    public function setUp()
    {
        parent::setUp();
        $this->logStockRepo = App::make(LogStockRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLogStock()
    {
        $logStock = $this->fakeLogStockData();
        $createdLogStock = $this->logStockRepo->create($logStock);
        $createdLogStock = $createdLogStock->toArray();
        $this->assertArrayHasKey('id', $createdLogStock);
        $this->assertNotNull($createdLogStock['id'], 'Created LogStock must have id specified');
        $this->assertNotNull(LogStock::find($createdLogStock['id']), 'LogStock with given id must be in DB');
        $this->assertModelData($logStock, $createdLogStock);
    }

    /**
     * @test read
     */
    public function testReadLogStock()
    {
        $logStock = $this->makeLogStock();
        $dbLogStock = $this->logStockRepo->find($logStock->id);
        $dbLogStock = $dbLogStock->toArray();
        $this->assertModelData($logStock->toArray(), $dbLogStock);
    }

    /**
     * @test update
     */
    public function testUpdateLogStock()
    {
        $logStock = $this->makeLogStock();
        $fakeLogStock = $this->fakeLogStockData();
        $updatedLogStock = $this->logStockRepo->update($fakeLogStock, $logStock->id);
        $this->assertModelData($fakeLogStock, $updatedLogStock->toArray());
        $dbLogStock = $this->logStockRepo->find($logStock->id);
        $this->assertModelData($fakeLogStock, $dbLogStock->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLogStock()
    {
        $logStock = $this->makeLogStock();
        $resp = $this->logStockRepo->delete($logStock->id);
        $this->assertTrue($resp);
        $this->assertNull(LogStock::find($logStock->id), 'LogStock should not exist in DB');
    }
}
