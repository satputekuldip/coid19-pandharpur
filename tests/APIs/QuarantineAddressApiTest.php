<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\QuarantineAddress;

class QuarantineAddressApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/quarantine_addresses', $quarantineAddress
        );

        $this->assertApiResponse($quarantineAddress);
    }

    /**
     * @test
     */
    public function test_read_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/quarantine_addresses/'.$quarantineAddress->id
        );

        $this->assertApiResponse($quarantineAddress->toArray());
    }

    /**
     * @test
     */
    public function test_update_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->create();
        $editedQuarantineAddress = factory(QuarantineAddress::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/quarantine_addresses/'.$quarantineAddress->id,
            $editedQuarantineAddress
        );

        $this->assertApiResponse($editedQuarantineAddress);
    }

    /**
     * @test
     */
    public function test_delete_quarantine_address()
    {
        $quarantineAddress = factory(QuarantineAddress::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/quarantine_addresses/'.$quarantineAddress->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/quarantine_addresses/'.$quarantineAddress->id
        );

        $this->response->assertStatus(404);
    }
}
