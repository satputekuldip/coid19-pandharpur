<?php namespace Tests\Repositories;

use App\Models\DailyDeath;
use App\Repositories\DailyDeathRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DailyDeathRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DailyDeathRepository
     */
    protected $dailyDeathRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dailyDeathRepo = \App::make(DailyDeathRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->make()->toArray();

        $createdDailyDeath = $this->dailyDeathRepo->create($dailyDeath);

        $createdDailyDeath = $createdDailyDeath->toArray();
        $this->assertArrayHasKey('id', $createdDailyDeath);
        $this->assertNotNull($createdDailyDeath['id'], 'Created DailyDeath must have id specified');
        $this->assertNotNull(DailyDeath::find($createdDailyDeath['id']), 'DailyDeath with given id must be in DB');
        $this->assertModelData($dailyDeath, $createdDailyDeath);
    }

    /**
     * @test read
     */
    public function test_read_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->create();

        $dbDailyDeath = $this->dailyDeathRepo->find($dailyDeath->id);

        $dbDailyDeath = $dbDailyDeath->toArray();
        $this->assertModelData($dailyDeath->toArray(), $dbDailyDeath);
    }

    /**
     * @test update
     */
    public function test_update_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->create();
        $fakeDailyDeath = factory(DailyDeath::class)->make()->toArray();

        $updatedDailyDeath = $this->dailyDeathRepo->update($fakeDailyDeath, $dailyDeath->id);

        $this->assertModelData($fakeDailyDeath, $updatedDailyDeath->toArray());
        $dbDailyDeath = $this->dailyDeathRepo->find($dailyDeath->id);
        $this->assertModelData($fakeDailyDeath, $dbDailyDeath->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->create();

        $resp = $this->dailyDeathRepo->delete($dailyDeath->id);

        $this->assertTrue($resp);
        $this->assertNull(DailyDeath::find($dailyDeath->id), 'DailyDeath should not exist in DB');
    }
}
