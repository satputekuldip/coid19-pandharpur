<?php namespace Tests\Repositories;

use App\Models\QuarantinePatient;
use App\Repositories\QuarantinePatientRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuarantinePatientRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuarantinePatientRepository
     */
    protected $quarantinePatientRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->quarantinePatientRepo = \App::make(QuarantinePatientRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->make()->toArray();

        $createdQuarantinePatient = $this->quarantinePatientRepo->create($quarantinePatient);

        $createdQuarantinePatient = $createdQuarantinePatient->toArray();
        $this->assertArrayHasKey('id', $createdQuarantinePatient);
        $this->assertNotNull($createdQuarantinePatient['id'], 'Created QuarantinePatient must have id specified');
        $this->assertNotNull(QuarantinePatient::find($createdQuarantinePatient['id']), 'QuarantinePatient with given id must be in DB');
        $this->assertModelData($quarantinePatient, $createdQuarantinePatient);
    }

    /**
     * @test read
     */
    public function test_read_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->create();

        $dbQuarantinePatient = $this->quarantinePatientRepo->find($quarantinePatient->id);

        $dbQuarantinePatient = $dbQuarantinePatient->toArray();
        $this->assertModelData($quarantinePatient->toArray(), $dbQuarantinePatient);
    }

    /**
     * @test update
     */
    public function test_update_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->create();
        $fakeQuarantinePatient = factory(QuarantinePatient::class)->make()->toArray();

        $updatedQuarantinePatient = $this->quarantinePatientRepo->update($fakeQuarantinePatient, $quarantinePatient->id);

        $this->assertModelData($fakeQuarantinePatient, $updatedQuarantinePatient->toArray());
        $dbQuarantinePatient = $this->quarantinePatientRepo->find($quarantinePatient->id);
        $this->assertModelData($fakeQuarantinePatient, $dbQuarantinePatient->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->create();

        $resp = $this->quarantinePatientRepo->delete($quarantinePatient->id);

        $this->assertTrue($resp);
        $this->assertNull(QuarantinePatient::find($quarantinePatient->id), 'QuarantinePatient should not exist in DB');
    }
}
