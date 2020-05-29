<?php namespace Tests\Repositories;

use App\Models\Tahsil;
use App\Repositories\TahsilRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TahsilRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TahsilRepository
     */
    protected $tahsilRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tahsilRepo = \App::make(TahsilRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tahsil()
    {
        $tahsil = factory(Tahsil::class)->make()->toArray();

        $createdTahsil = $this->tahsilRepo->create($tahsil);

        $createdTahsil = $createdTahsil->toArray();
        $this->assertArrayHasKey('id', $createdTahsil);
        $this->assertNotNull($createdTahsil['id'], 'Created Tahsil must have id specified');
        $this->assertNotNull(Tahsil::find($createdTahsil['id']), 'Tahsil with given id must be in DB');
        $this->assertModelData($tahsil, $createdTahsil);
    }

    /**
     * @test read
     */
    public function test_read_tahsil()
    {
        $tahsil = factory(Tahsil::class)->create();

        $dbTahsil = $this->tahsilRepo->find($tahsil->id);

        $dbTahsil = $dbTahsil->toArray();
        $this->assertModelData($tahsil->toArray(), $dbTahsil);
    }

    /**
     * @test update
     */
    public function test_update_tahsil()
    {
        $tahsil = factory(Tahsil::class)->create();
        $fakeTahsil = factory(Tahsil::class)->make()->toArray();

        $updatedTahsil = $this->tahsilRepo->update($fakeTahsil, $tahsil->id);

        $this->assertModelData($fakeTahsil, $updatedTahsil->toArray());
        $dbTahsil = $this->tahsilRepo->find($tahsil->id);
        $this->assertModelData($fakeTahsil, $dbTahsil->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tahsil()
    {
        $tahsil = factory(Tahsil::class)->create();

        $resp = $this->tahsilRepo->delete($tahsil->id);

        $this->assertTrue($resp);
        $this->assertNull(Tahsil::find($tahsil->id), 'Tahsil should not exist in DB');
    }
}
