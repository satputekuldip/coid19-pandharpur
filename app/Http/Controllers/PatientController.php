<?php

namespace App\Http\Controllers;

use App\DataTables\PatientDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\District;
use App\Models\EntryPoint;
use App\Models\State;
use App\Models\Tahsil;
use App\Repositories\PatientRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PatientController extends AppBaseController
{
    /** @var  PatientRepository */
    private $patientRepository;

    public function __construct(PatientRepository $patientRepo)
    {
        $this->patientRepository = $patientRepo;
    }

    /**
     * Display a listing of the Patient.
     *
     * @param PatientDataTable $patientDataTable
     * @return Response
     */
    public function index(PatientDataTable $patientDataTable)
    {
        return $patientDataTable->render('patients.index');
    }

    /**
     * Show the form for creating a new Patient.
     *
     * @return Response
     */
    public function create()
    {
        $states = State::pluck('name','id')->toArray();
        $districts = District::pluck('name','id')->toArray();
        $tahasils = Tahsil::pluck('name','id')->toArray();
        $entryPoints = EntryPoint::pluck('name','id')->toArray();
        return view('patients.create',compact('states','entryPoints','districts','tahasils'));
    }


    public function districts_of_state($id){
        $response = "<option value=''>Select District</option>\n";

        $districts = State::find($id)->districts;

        foreach ($districts as $district){
            $response.= "<option value='$district->id'>$district->name</option>\n";
        }

        return $response;
    }


    public function tahsils_of_district($id){
        $response = '<option value="">Select Tahasil</option>\n';

        $tahasils = District::find($id)->tahasils;

        foreach ($tahasils as $tahasil){
            $response.= "<option value=$tahasil->id>$tahasil->name</option>\n";
        }

        return $response;
    }


    public function entryPoints_of_tahsils($id){
        $response = '<option value="">Select Entry Point</option>\n';

        $entrypoints = Tahsil::find($id)->entrypoints;

        foreach ($entrypoints as $entrypoint){
            $response.= "<option value=$entrypoint->id>$entrypoint->name</option>\n";
        }

        return $response;
    }

    /**
     * Store a newly created Patient in storage.
     *
     * @param CreatePatientRequest $request
     *
     * @return Response
     */
    public function store(CreatePatientRequest $request)
    {
        $input = $request->all();

        $input['state'] = State::find($input['state_id'])->name;
        $input['district'] = District::find($input['district_id'])->name;
        $input['tahasil'] = Tahsil::find($input['tahasil_id'])->name;
        $input['entry_point'] = EntryPoint::find($input['entry_point_id'])->name;

        $patient = $this->patientRepository->create($input);

        Flash::success('Patient saved successfully.');

        return redirect(route('patients.index'));
    }

    /**
     * Display the specified Patient.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            Flash::error('Patient not found');

            return redirect(route('patients.index'));
        }

        return view('patients.show')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified Patient.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            Flash::error('Patient not found');

            return redirect(route('patients.index'));
        }

        return view('patients.edit')->with('patient', $patient);
    }

    /**
     * Update the specified Patient in storage.
     *
     * @param  int              $id
     * @param UpdatePatientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePatientRequest $request)
    {
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            Flash::error('Patient not found');

            return redirect(route('patients.index'));
        }

        $patient = $this->patientRepository->update($request->all(), $id);

        Flash::success('Patient updated successfully.');

        return redirect(route('patients.index'));
    }

    /**
     * Remove the specified Patient from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            Flash::error('Patient not found');

            return redirect(route('patients.index'));
        }

        $this->patientRepository->delete($id);

        Flash::success('Patient deleted successfully.');

        return redirect(route('patients.index'));
    }
}
