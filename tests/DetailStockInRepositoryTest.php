<?php

use App\Models\DetailStockIn;
use App\Repositories\DetailStockInRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailStockInRepositoryTest extends TestCase
{
    use MakeDetailStockInTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailStockInRepository
     */
    protected $detailStockInRepo;

    public function setUp()
    {
        parent::setUp();
        $this->detailStockInRepo = App::make(DetailStockInRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDetailStockIn()
    {
        $detailStockIn = $this->fakeDetailStockInData();
        $createdDetailStockIn = $this->detailStockInRepo->create($detailStockIn);
        $createdDetailStockIn = $createdDetailStockIn->toArray();
        $this->assertArrayHasKey('id', $createdDetailStockIn);
        $this->assertNotNull($createdDetailStockIn['id'], 'Created DetailStockIn must have id specified');
        $this->assertNotNull(DetailStockIn::find($createdDetailStockIn['id']), 'DetailStockIn with given id must be in DB');
        $this->assertModelData($detailStockIn, $createdDetailStockIn);
    }

    /**
     * @test read
     */
    public function testReadDetailStockIn()
    {
        $detailStockIn = $this->makeDetailStockIn();
        $dbDetailStockIn = $this->detailStockInRepo->find($detailStockIn->id);
        $dbDetailStockIn = $dbDetailStockIn->toArray();
        $this->assertModelData($detailStockIn->toArray(), $dbDetailStockIn);
    }

    /**
     * @test update
     */
    public function testUpdateDetailStockIn()
    {
        $detailStockIn = $this->makeDetailStockIn();
        $fakeDetailStockIn = $this->fakeDetailStockInData();
        $updatedDetailStockIn = $this->detailStockInRepo->update($fakeDetailStockIn, $detailStockIn->id);
        $this->assertModelData($fakeDetailStockIn, $updatedDetailStockIn->toArray());
        $dbDetailStockIn = $this->detailStockInRepo->find($detailStockIn->id);
        $this->assertModelData($fakeDetailStockIn, $dbDetailStockIn->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDetailStockIn()
    {
        $detailStockIn = $this->makeDetailStockIn();
        $resp = $this->detailStockInRepo->delete($detailStockIn->id);
        $this->assertTrue($resp);
        $this->assertNull(DetailStockIn::find($detailStockIn->id), 'DetailStockIn should not exist in DB');
    }
}
