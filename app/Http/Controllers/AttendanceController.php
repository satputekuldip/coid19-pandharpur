<?php

namespace App\Http\Controllers;

use App\DataTables\AttendanceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
use App\Models\Patient;
use App\Models\QuarantinePatient;
use App\Models\Symptom;
use App\Repositories\AttendanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AttendanceController extends AppBaseController
{
    /** @var  AttendanceRepository */
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * Display a listing of the Attendance.
     *
     * @param AttendanceDataTable $attendanceDataTable
     * @return Response
     */
    public function index(AttendanceDataTable $attendanceDataTable)
    {
        return $attendanceDataTable->render('attendances.index');
    }

    /**
     * Show the form for creating a new Attendance.
     *
     * @return Response
     */
    public function create()
    {
//        return Patient::pluck('full_name','id')->toArray();
//        $patients= Patient::pluck('full_name','id')->toArray();

        $quarantinePatients = QuarantinePatient::all();
        $patients = array();

        foreach ($quarantinePatients as $quarantinePatient){
//             array_push($patients , json_encode([$quarantinePatient->patient->id => $quarantinePatient->patient->full_name]));
            $patients = array_merge($patients , ["\"".$quarantinePatient->patient->id."\"" => $quarantinePatient->patient->full_name]);
//            $patients .=  json_encode([$quarantinePatient->patient->id => $quarantinePatient->patient->full_name]);
        }

//        return $patients;
        return view('attendances.create',compact('patients'));
    }

    public function add_attendance($id){
        $quarantinePatientId = QuarantinePatient::find($id)->patient->id;
        $symptoms = Symptom::pluck('name')->toArray();
        return view('attendances.add_attendance',compact('quarantinePatientId','symptoms'));
    }

    /**
     * Store a newly created Attendance in storage.
     *
     * @param CreateAttendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceRequest $request)
    {
        $input = $request->all();
        $attendance = null;
        $todaysCount = Attendance::where('patient_id',$input['patient_id'])
            ->whereDate('checked_at',$input['checked_at'])->count();
        $input['complete_quarantine_days'] = Attendance::where('patient_id',$input['patient_id'])->count() + 1;

        if ($todaysCount == 0) {
            $symptoms = json_decode($input['symptoms'], true);
            $m_symptoms = "";
            foreach ($symptoms as $tag) {
                $db_tag = null;
                $tag_count = Symptom::where('name', $tag['value'])->count();
                if ($tag_count == 0) {
                    $db_tag = Symptom::create([
                        'name' => $tag['value'],
                        'name_marathi' => $tag['value']
                    ]);
                } else {
                    $db_tag = Symptom::where('name', $tag['value'])->first();
                }
                $m_symptoms .= $tag['value'] . ",";

            }
            $input['symptoms'] = $m_symptoms;

            $attendance = $this->attendanceRepository->create($input);
            Flash::success('Attendance saved successfully.');
        } else {
            Flash::warning('Today\'s Attendance Already saved.');
        }



        if ($attendance->patient->quarantinePatient->quarantineAddress->type == "HOME"){

            return redirect(route('quarantinePatients.index'));
        }
        return redirect(route('quarantinePatients.institute'));
    }

    /**
     * Display the specified Attendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.show')->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified Attendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendance = $this->attendanceRepository->find($id);
        $symptoms = Symptom::pluck('name')->toArray();
        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.edit',compact('symptoms'))->with('attendance', $attendance);
    }

    /**
     * Update the specified Attendance in storage.
     *
     * @param  int              $id
     * @param UpdateAttendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->find($id);
        $input = $request->all();
        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $symptoms = json_decode($input['symptoms'], true);
        $m_symptoms = "";
        foreach ($symptoms as $tag) {
            $db_tag = null;
            $tag_count = Symptom::where('name', $tag['value'])->count();
            if ($tag_count == 0) {
                $db_tag = Symptom::create([
                    'name' => $tag['value'],
                    'name_marathi' => $tag['value']
                ]);
            } else {
                $db_tag = Symptom::where('name', $tag['value'])->first();
            }
            $m_symptoms .= $tag['value'] . ",";

        }
        $input['symptoms'] = $m_symptoms;

        $attendance = $this->attendanceRepository->update($input, $id);

        Flash::success('Attendance updated successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Remove the specified Attendance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $this->attendanceRepository->delete($id);

        Flash::success('Attendance deleted successfully.');

        return redirect(route('attendances.index'));
    }
}
