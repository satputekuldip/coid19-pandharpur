<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Tahsil;

class TahsilApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tahsil()
    {
        $tahsil = factory(Tahsil::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tahsils', $tahsil
        );

        $this->assertApiResponse($tahsil);
    }

    /**
     * @test
     */
    public function test_read_tahsil()
    {
        $tahsil = factory(Tahsil::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tahsils/'.$tahsil->id
        );

        $this->assertApiResponse($tahsil->toArray());
    }

    /**
     * @test
     */
    public function test_update_tahsil()
    {
        $tahsil = factory(Tahsil::class)->create();
        $editedTahsil = factory(Tahsil::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tahsils/'.$tahsil->id,
            $editedTahsil
        );

        $this->assertApiResponse($editedTahsil);
    }

    /**
     * @test
     */
    public function test_delete_tahsil()
    {
        $tahsil = factory(Tahsil::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tahsils/'.$tahsil->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tahsils/'.$tahsil->id
        );

        $this->response->assertStatus(404);
    }
}
