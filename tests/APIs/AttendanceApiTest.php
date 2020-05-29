<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Attendance;

class AttendanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_attendance()
    {
        $attendance = factory(Attendance::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/attendances', $attendance
        );

        $this->assertApiResponse($attendance);
    }

    /**
     * @test
     */
    public function test_read_attendance()
    {
        $attendance = factory(Attendance::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/attendances/'.$attendance->id
        );

        $this->assertApiResponse($attendance->toArray());
    }

    /**
     * @test
     */
    public function test_update_attendance()
    {
        $attendance = factory(Attendance::class)->create();
        $editedAttendance = factory(Attendance::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/attendances/'.$attendance->id,
            $editedAttendance
        );

        $this->assertApiResponse($editedAttendance);
    }

    /**
     * @test
     */
    public function test_delete_attendance()
    {
        $attendance = factory(Attendance::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/attendances/'.$attendance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/attendances/'.$attendance->id
        );

        $this->response->assertStatus(404);
    }
}
