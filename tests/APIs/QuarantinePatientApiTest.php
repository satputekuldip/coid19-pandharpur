<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\QuarantinePatient;

class QuarantinePatientApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/quarantine_patients', $quarantinePatient
        );

        $this->assertApiResponse($quarantinePatient);
    }

    /**
     * @test
     */
    public function test_read_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/quarantine_patients/'.$quarantinePatient->id
        );

        $this->assertApiResponse($quarantinePatient->toArray());
    }

    /**
     * @test
     */
    public function test_update_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->create();
        $editedQuarantinePatient = factory(QuarantinePatient::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/quarantine_patients/'.$quarantinePatient->id,
            $editedQuarantinePatient
        );

        $this->assertApiResponse($editedQuarantinePatient);
    }

    /**
     * @test
     */
    public function test_delete_quarantine_patient()
    {
        $quarantinePatient = factory(QuarantinePatient::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/quarantine_patients/'.$quarantinePatient->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/quarantine_patients/'.$quarantinePatient->id
        );

        $this->response->assertStatus(404);
    }
}
