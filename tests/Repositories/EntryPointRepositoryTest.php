<?php namespace Tests\Repositories;

use App\Models\EntryPoint;
use App\Repositories\EntryPointRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EntryPointRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EntryPointRepository
     */
    protected $entryPointRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->entryPointRepo = \App::make(EntryPointRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->make()->toArray();

        $createdEntryPoint = $this->entryPointRepo->create($entryPoint);

        $createdEntryPoint = $createdEntryPoint->toArray();
        $this->assertArrayHasKey('id', $createdEntryPoint);
        $this->assertNotNull($createdEntryPoint['id'], 'Created EntryPoint must have id specified');
        $this->assertNotNull(EntryPoint::find($createdEntryPoint['id']), 'EntryPoint with given id must be in DB');
        $this->assertModelData($entryPoint, $createdEntryPoint);
    }

    /**
     * @test read
     */
    public function test_read_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->create();

        $dbEntryPoint = $this->entryPointRepo->find($entryPoint->id);

        $dbEntryPoint = $dbEntryPoint->toArray();
        $this->assertModelData($entryPoint->toArray(), $dbEntryPoint);
    }

    /**
     * @test update
     */
    public function test_update_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->create();
        $fakeEntryPoint = factory(EntryPoint::class)->make()->toArray();

        $updatedEntryPoint = $this->entryPointRepo->update($fakeEntryPoint, $entryPoint->id);

        $this->assertModelData($fakeEntryPoint, $updatedEntryPoint->toArray());
        $dbEntryPoint = $this->entryPointRepo->find($entryPoint->id);
        $this->assertModelData($fakeEntryPoint, $dbEntryPoint->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->create();

        $resp = $this->entryPointRepo->delete($entryPoint->id);

        $this->assertTrue($resp);
        $this->assertNull(EntryPoint::find($entryPoint->id), 'EntryPoint should not exist in DB');
    }
}
