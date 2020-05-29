<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Symptom;

class SymptomApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_symptom()
    {
        $symptom = factory(Symptom::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/symptoms', $symptom
        );

        $this->assertApiResponse($symptom);
    }

    /**
     * @test
     */
    public function test_read_symptom()
    {
        $symptom = factory(Symptom::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/symptoms/'.$symptom->id
        );

        $this->assertApiResponse($symptom->toArray());
    }

    /**
     * @test
     */
    public function test_update_symptom()
    {
        $symptom = factory(Symptom::class)->create();
        $editedSymptom = factory(Symptom::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/symptoms/'.$symptom->id,
            $editedSymptom
        );

        $this->assertApiResponse($editedSymptom);
    }

    /**
     * @test
     */
    public function test_delete_symptom()
    {
        $symptom = factory(Symptom::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/symptoms/'.$symptom->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/symptoms/'.$symptom->id
        );

        $this->response->assertStatus(404);
    }
}
