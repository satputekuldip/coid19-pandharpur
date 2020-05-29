<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DailyDeath;

class DailyDeathApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/daily_deaths', $dailyDeath
        );

        $this->assertApiResponse($dailyDeath);
    }

    /**
     * @test
     */
    public function test_read_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/daily_deaths/'.$dailyDeath->id
        );

        $this->assertApiResponse($dailyDeath->toArray());
    }

    /**
     * @test
     */
    public function test_update_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->create();
        $editedDailyDeath = factory(DailyDeath::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/daily_deaths/'.$dailyDeath->id,
            $editedDailyDeath
        );

        $this->assertApiResponse($editedDailyDeath);
    }

    /**
     * @test
     */
    public function test_delete_daily_death()
    {
        $dailyDeath = factory(DailyDeath::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/daily_deaths/'.$dailyDeath->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/daily_deaths/'.$dailyDeath->id
        );

        $this->response->assertStatus(404);
    }
}
