<?php

use App\Models\DetailStockOut;
use App\Repositories\DetailStockOutRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailStockOutRepositoryTest extends TestCase
{
    use MakeDetailStockOutTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailStockOutRepository
     */
    protected $detailStockOutRepo;

    public function setUp()
    {
        parent::setUp();
        $this->detailStockOutRepo = App::make(DetailStockOutRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDetailStockOut()
    {
        $detailStockOut = $this->fakeDetailStockOutData();
        $createdDetailStockOut = $this->detailStockOutRepo->create($detailStockOut);
        $createdDetailStockOut = $createdDetailStockOut->toArray();
        $this->assertArrayHasKey('id', $createdDetailStockOut);
        $this->assertNotNull($createdDetailStockOut['id'], 'Created DetailStockOut must have id specified');
        $this->assertNotNull(DetailStockOut::find($createdDetailStockOut['id']), 'DetailStockOut with given id must be in DB');
        $this->assertModelData($detailStockOut, $createdDetailStockOut);
    }

    /**
     * @test read
     */
    public function testReadDetailStockOut()
    {
        $detailStockOut = $this->makeDetailStockOut();
        $dbDetailStockOut = $this->detailStockOutRepo->find($detailStockOut->id);
        $dbDetailStockOut = $dbDetailStockOut->toArray();
        $this->assertModelData($detailStockOut->toArray(), $dbDetailStockOut);
    }

    /**
     * @test update
     */
    public function testUpdateDetailStockOut()
    {
        $detailStockOut = $this->makeDetailStockOut();
        $fakeDetailStockOut = $this->fakeDetailStockOutData();
        $updatedDetailStockOut = $this->detailStockOutRepo->update($fakeDetailStockOut, $detailStockOut->id);
        $this->assertModelData($fakeDetailStockOut, $updatedDetailStockOut->toArray());
        $dbDetailStockOut = $this->detailStockOutRepo->find($detailStockOut->id);
        $this->assertModelData($fakeDetailStockOut, $dbDetailStockOut->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDetailStockOut()
    {
        $detailStockOut = $this->makeDetailStockOut();
        $resp = $this->detailStockOutRepo->delete($detailStockOut->id);
        $this->assertTrue($resp);
        $this->assertNull(DetailStockOut::find($detailStockOut->id), 'DetailStockOut should not exist in DB');
    }
}
