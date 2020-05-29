<?php namespace Tests\Repositories;

use App\Models\Symptom;
use App\Repositories\SymptomRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SymptomRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SymptomRepository
     */
    protected $symptomRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->symptomRepo = \App::make(SymptomRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_symptom()
    {
        $symptom = factory(Symptom::class)->make()->toArray();

        $createdSymptom = $this->symptomRepo->create($symptom);

        $createdSymptom = $createdSymptom->toArray();
        $this->assertArrayHasKey('id', $createdSymptom);
        $this->assertNotNull($createdSymptom['id'], 'Created Symptom must have id specified');
        $this->assertNotNull(Symptom::find($createdSymptom['id']), 'Symptom with given id must be in DB');
        $this->assertModelData($symptom, $createdSymptom);
    }

    /**
     * @test read
     */
    public function test_read_symptom()
    {
        $symptom = factory(Symptom::class)->create();

        $dbSymptom = $this->symptomRepo->find($symptom->id);

        $dbSymptom = $dbSymptom->toArray();
        $this->assertModelData($symptom->toArray(), $dbSymptom);
    }

    /**
     * @test update
     */
    public function test_update_symptom()
    {
        $symptom = factory(Symptom::class)->create();
        $fakeSymptom = factory(Symptom::class)->make()->toArray();

        $updatedSymptom = $this->symptomRepo->update($fakeSymptom, $symptom->id);

        $this->assertModelData($fakeSymptom, $updatedSymptom->toArray());
        $dbSymptom = $this->symptomRepo->find($symptom->id);
        $this->assertModelData($fakeSymptom, $dbSymptom->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_symptom()
    {
        $symptom = factory(Symptom::class)->create();

        $resp = $this->symptomRepo->delete($symptom->id);

        $this->assertTrue($resp);
        $this->assertNull(Symptom::find($symptom->id), 'Symptom should not exist in DB');
    }
}
