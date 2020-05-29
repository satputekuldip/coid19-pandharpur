<?php

namespace App\Http\Controllers;

use App\DataTables\QuarantinePatientDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuarantinePatientRequest;
use App\Http\Requests\UpdateQuarantinePatientRequest;
use App\Repositories\QuarantinePatientRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class QuarantinePatientController extends AppBaseController
{
    /** @var  QuarantinePatientRepository */
    private $quarantinePatientRepository;

    public function __construct(QuarantinePatientRepository $quarantinePatientRepo)
    {
        $this->quarantinePatientRepository = $quarantinePatientRepo;
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

        $quarantinePatient = $this->quarantinePatientRepository->create($input);

        Flash::success('Quarantine Patient saved successfully.');

        return redirect(route('quarantinePatients.index'));
    }

    /**
     * Display the specified QuarantinePatient.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  int              $id
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
     * @param  int $id
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
