<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuarantinePatientAPIRequest;
use App\Http\Requests\API\UpdateQuarantinePatientAPIRequest;
use App\Models\QuarantinePatient;
use App\Repositories\QuarantinePatientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QuarantinePatientController
 * @package App\Http\Controllers\API
 */

class QuarantinePatientAPIController extends AppBaseController
{
    /** @var  QuarantinePatientRepository */
    private $quarantinePatientRepository;

    public function __construct(QuarantinePatientRepository $quarantinePatientRepo)
    {
        $this->quarantinePatientRepository = $quarantinePatientRepo;
    }

    /**
     * Display a listing of the QuarantinePatient.
     * GET|HEAD /quarantinePatients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $quarantinePatients = $this->quarantinePatientRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($quarantinePatients->toArray(), 'Quarantine Patients retrieved successfully');
    }

    /**
     * Store a newly created QuarantinePatient in storage.
     * POST /quarantinePatients
     *
     * @param CreateQuarantinePatientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuarantinePatientAPIRequest $request)
    {
        $input = $request->all();

        $quarantinePatient = $this->quarantinePatientRepository->create($input);

        return $this->sendResponse($quarantinePatient->toArray(), 'Quarantine Patient saved successfully');
    }

    /**
     * Display the specified QuarantinePatient.
     * GET|HEAD /quarantinePatients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var QuarantinePatient $quarantinePatient */
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            return $this->sendError('Quarantine Patient not found');
        }

        return $this->sendResponse($quarantinePatient->toArray(), 'Quarantine Patient retrieved successfully');
    }

    /**
     * Update the specified QuarantinePatient in storage.
     * PUT/PATCH /quarantinePatients/{id}
     *
     * @param int $id
     * @param UpdateQuarantinePatientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuarantinePatientAPIRequest $request)
    {
        $input = $request->all();

        /** @var QuarantinePatient $quarantinePatient */
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            return $this->sendError('Quarantine Patient not found');
        }

        $quarantinePatient = $this->quarantinePatientRepository->update($input, $id);

        return $this->sendResponse($quarantinePatient->toArray(), 'QuarantinePatient updated successfully');
    }

    /**
     * Remove the specified QuarantinePatient from storage.
     * DELETE /quarantinePatients/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var QuarantinePatient $quarantinePatient */
        $quarantinePatient = $this->quarantinePatientRepository->find($id);

        if (empty($quarantinePatient)) {
            return $this->sendError('Quarantine Patient not found');
        }

        $quarantinePatient->delete();

        return $this->sendSuccess('Quarantine Patient deleted successfully');
    }
}
