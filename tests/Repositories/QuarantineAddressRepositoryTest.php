<?php namespace Tests\Repositories;

use App\Models\QuarantineAddress;
use App\Repositories\QuarantineAddressRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuarantineAddressRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuarantineAddressRepository
     */
    protected $quarantineAddressRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->quarantineAddressRepo = \App::make(QuarantineAddressRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->make()->toArray();

        $createdQuarantineAddress = $this->quarantineAddressRepo->create($quarantineAddress);

        $createdQuarantineAddress = $createdQuarantineAddress->toArray();
        $this->assertArrayHasKey('id', $createdQuarantineAddress);
        $this->assertNotNull($createdQuarantineAddress['id'], 'Created QuarantineAddress must have id specified');
        $this->assertNotNull(QuarantineAddress::find($createdQuarantineAddress['id']), 'QuarantineAddress with given id must be in DB');
        $this->assertModelData($quarantineAddress, $createdQuarantineAddress);
    }

    /**
     * @test read
     */
    public function test_read_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->create();

        $dbQuarantineAddress = $this->quarantineAddressRepo->find($quarantineAddress->id);

        $dbQuarantineAddress = $dbQuarantineAddress->toArray();
        $this->assertModelData($quarantineAddress->toArray(), $dbQuarantineAddress);
    }

    /**
     * @test update
     */
    public function test_update_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->create();
        $fakeQuarantineAddress = factory(QuarantineAddress::class)->make()->toArray();

        $updatedQuarantineAddress = $this->quarantineAddressRepo->update($fakeQuarantineAddress, $quarantineAddress->id);

        $this->assertModelData($fakeQuarantineAddress, $updatedQuarantineAddress->toArray());
        $dbQuarantineAddress = $this->quarantineAddressRepo->find($quarantineAddress->id);
        $this->assertModelData($fakeQuarantineAddress, $dbQuarantineAddress->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->create();

        $resp = $this->quarantineAddressRepo->delete($quarantineAddress->id);

        $this->assertTrue($resp);
        $this->assertNull(QuarantineAddress::find($quarantineAddress->id), 'QuarantineAddress should not exist in DB');
    }
}
