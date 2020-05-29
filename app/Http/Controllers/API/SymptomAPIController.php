<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSymptomAPIRequest;
use App\Http\Requests\API\UpdateSymptomAPIRequest;
use App\Models\Symptom;
use App\Repositories\SymptomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SymptomController
 * @package App\Http\Controllers\API
 */

class SymptomAPIController extends AppBaseController
{
    /** @var  SymptomRepository */
    private $symptomRepository;

    public function __construct(SymptomRepository $symptomRepo)
    {
        $this->symptomRepository = $symptomRepo;
    }

    /**
     * Display a listing of the Symptom.
     * GET|HEAD /symptoms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $symptoms = $this->symptomRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($symptoms->toArray(), 'Symptoms retrieved successfully');
    }

    /**
     * Store a newly created Symptom in storage.
     * POST /symptoms
     *
     * @param CreateSymptomAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSymptomAPIRequest $request)
    {
        $input = $request->all();

        $symptom = $this->symptomRepository->create($input);

        return $this->sendResponse($symptom->toArray(), 'Symptom saved successfully');
    }

    /**
     * Display the specified Symptom.
     * GET|HEAD /symptoms/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Symptom $symptom */
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            return $this->sendError('Symptom not found');
        }

        return $this->sendResponse($symptom->toArray(), 'Symptom retrieved successfully');
    }

    /**
     * Update the specified Symptom in storage.
     * PUT/PATCH /symptoms/{id}
     *
     * @param int $id
     * @param UpdateSymptomAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSymptomAPIRequest $request)
    {
        $input = $request->all();

        /** @var Symptom $symptom */
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            return $this->sendError('Symptom not found');
        }

        $symptom = $this->symptomRepository->update($input, $id);

        return $this->sendResponse($symptom->toArray(), 'Symptom updated successfully');
    }

    /**
     * Remove the specified Symptom from storage.
     * DELETE /symptoms/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Symptom $symptom */
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            return $this->sendError('Symptom not found');
        }

        $symptom->delete();

        return $this->sendSuccess('Symptom deleted successfully');
    }
}
