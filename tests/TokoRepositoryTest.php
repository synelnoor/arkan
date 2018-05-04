<?php

use App\Models\Toko;
use App\Repositories\TokoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TokoRepositoryTest extends TestCase
{
    use MakeTokoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TokoRepository
     */
    protected $tokoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tokoRepo = App::make(TokoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateToko()
    {
        $toko = $this->fakeTokoData();
        $createdToko = $this->tokoRepo->create($toko);
        $createdToko = $createdToko->toArray();
        $this->assertArrayHasKey('id', $createdToko);
        $this->assertNotNull($createdToko['id'], 'Created Toko must have id specified');
        $this->assertNotNull(Toko::find($createdToko['id']), 'Toko with given id must be in DB');
        $this->assertModelData($toko, $createdToko);
    }

    /**
     * @test read
     */
    public function testReadToko()
    {
        $toko = $this->makeToko();
        $dbToko = $this->tokoRepo->find($toko->id);
        $dbToko = $dbToko->toArray();
        $this->assertModelData($toko->toArray(), $dbToko);
    }

    /**
     * @test update
     */
    public function testUpdateToko()
    {
        $toko = $this->makeToko();
        $fakeToko = $this->fakeTokoData();
        $updatedToko = $this->tokoRepo->update($fakeToko, $toko->id);
        $this->assertModelData($fakeToko, $updatedToko->toArray());
        $dbToko = $this->tokoRepo->find($toko->id);
        $this->assertModelData($fakeToko, $dbToko->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteToko()
    {
        $toko = $this->makeToko();
        $resp = $this->tokoRepo->delete($toko->id);
        $this->assertTrue($resp);
        $this->assertNull(Toko::find($toko->id), 'Toko should not exist in DB');
    }
}
