<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EntryPoint;

class EntryPointApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/entry_points', $entryPoint
        );

        $this->assertApiResponse($entryPoint);
    }

    /**
     * @test
     */
    public function test_read_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/entry_points/'.$entryPoint->id
        );

        $this->assertApiResponse($entryPoint->toArray());
    }

    /**
     * @test
     */
    public function test_update_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->create();
        $editedEntryPoint = factory(EntryPoint::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/entry_points/'.$entryPoint->id,
            $editedEntryPoint
        );

        $this->assertApiResponse($editedEntryPoint);
    }

    /**
     * @test
     */
    public function test_delete_entry_point()
    {
        $entryPoint = factory(EntryPoint::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/entry_points/'.$entryPoint->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/entry_points/'.$entryPoint->id
        );

        $this->response->assertStatus(404);
    }
}
