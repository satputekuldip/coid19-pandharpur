<?php

namespace App\Http\Controllers;

use App\DataTables\InstituteQuarantinePatientDataTable;
use App\DataTables\QuarantinePatientDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInstituteQuarantinePatientRequest;
use App\Http\Requests\CreateQuarantinePatientRequest;
use App\Http\Requests\UpdateQuarantinePatientRequest;
use App\Models\District;
use App\Models\Patient;
use App\Models\QuarantineAddress;
use App\Models\QuarantinePatient;
use App\Models\State;
use App\Models\Tahsil;
use App\Repositories\QuarantineAddressRepository;
use App\Repositories\QuarantinePatientRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Request;
use Response;

class QuarantinePatientController extends AppBaseController
{
    /** @var  QuarantinePatientRepository */
    private $quarantinePatientRepository;
    private $quarantineAddressRepository;

    public function __construct(QuarantinePatientRepository $quarantinePatientRepo, QuarantineAddressRepository $quarantineAddressRepo)
    {
        $this->quarantinePatientRepository = $quarantinePatientRepo;
        $this->quarantineAddressRepository = $quarantineAddressRepo;
    }

    /**
     * Display a listing of the QuarantinePatient.
     *
     * @param QuarantinePatientDataTable $quarantinePatientDataTable
     * @return Response
     */
    public function index(QuarantinePatientDataTable $quarantinePatientDataTable)
    {
        return $quarantinePatientDataTable->render('quarantine_patients.index');
    }

    public function institute(InstituteQuarantinePatientDataTable $quarantinePatientDataTable)
    {
        return $quarantinePatientDataTable->render('quarantine_patients.index');
    }

    public function home_quarantine($id)
    {
        $states = State::pluck('name', 'id')->toArray();
        $districts = District::pluck('name', 'id')->toArray();
        $tahasils = Tahsil::pluck('name', 'id')->toArray();
        $patient = Patient::find($id);
        return view('quarantine_patients.add_home_quarantine', compact('id', 'patient', 'states', 'districts', 'tahasils'));
    }

    public function institute_quarantine($id)
    {
//        $quarantinePatientId = QuarantinePatient::find($id)->patient->id;
        $institutes = QuarantineAddress::where('type', 'INSTITUTE')->pluck('name', 'id')->toArray();
        return view('quarantine_patients.add_institute_quarantine', compact('id', 'institutes'));
    }

    /**
     * Show the form for creating a new QuarantinePatient.
     *
     * @return Response
     */
    public function create()
    {
        return view('quarantine_patients.create');
    }

    /**
     * Store a newly created QuarantinePatient in storage.
     *
     * @param CreateQuarantinePatientRequest $request
     *
     * @return Response
     */
    public function store(CreateQuarantinePatientRequest $request)
    {
        $input = $request->all();

        $input['state'] = State::find($input['state_id'])->name;
        $input['district'] = District::find($input['district_id'])->name;
        $input['tahasil'] = Tahsil::find($input['tahasil_id'])->name;

        $quarantineAddress = $this->quarantineAddressRepository->create($input);

        $input['quarantine_address_id'] = $quarantineAddress->id;

        $quarantinePatient = $this->quarantinePatientRepository->create($input);

        Flash::success('Quarantine Patient saved successfully.');

        return redirect(route('quarantinePatients.index'));
    }

    public function store_institute_quarantine_patient(CreateInstituteQuarantinePatientRequest $request)
    {
        $input = $request->all();

        $quarantinePatient = $this->quarantinePatientRepository->create($input);

        Flash::success('Quarantine Patient saved successfully.');

        return redirect(route('quarantinePatients.institute'));
    }

    /**
     * Display the specified QuarantinePatient.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            Flash::error('Quarantine Patient not found');

            return redirect(route('quarantinePatients.index'));
        }

        return view('quarantine_patients.show')->with('quarantinePatient', $quarantinePatient);
    }

    /**
     * Show the form for editing the specified QuarantinePatient.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            Flash::error('Quarantine Patient not found');

            return redirect(route('quarantinePatients.index'));
        }

        return view('quarantine_patients.edit')->with('quarantinePatient', $quarantinePatient);
    }

    /**
     * Update the specified QuarantinePatient in storage.
     *
     * @param int $id
     * @param UpdateQuarantinePatientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuarantinePatientRequest $request)
    {
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            Flash::error('Quarantine Patient not found');

            return redirect(route('quarantinePatients.index'));
        }

        $quarantinePatient = $this->quarantinePatientRepository->update($request->all(), $id);

        Flash::success('Quarantine Patient updated successfully.');

        return redirect(route('quarantinePatients.index'));
    }

    /**
     * Remove the specified QuarantinePatient from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            Flash::error('Quarantine Patient not found');

            return redirect(route('quarantinePatients.index'));
        }

        $this->quarantinePatientRepository->delete($id);

        Flash::success('Quarantine Patient deleted successfully.');

        return redirect(route('quarantinePatients.index'));
    }
}
