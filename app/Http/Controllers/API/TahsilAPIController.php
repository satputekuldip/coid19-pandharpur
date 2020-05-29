<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTahsilAPIRequest;
use App\Http\Requests\API\UpdateTahsilAPIRequest;
use App\Models\Tahsil;
use App\Repositories\TahsilRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TahsilController
 * @package App\Http\Controllers\API
 */

class TahsilAPIController extends AppBaseController
{
    /** @var  TahsilRepository */
    private $tahsilRepository;

    public function __construct(TahsilRepository $tahsilRepo)
    {
        $this->tahsilRepository = $tahsilRepo;
    }

    /**
     * Display a listing of the Tahsil.
     * GET|HEAD /tahsils
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tahsils = $this->tahsilRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tahsils->toArray(), 'Tahsils retrieved successfully');
    }

    /**
     * Store a newly created Tahsil in storage.
     * POST /tahsils
     *
     * @param CreateTahsilAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTahsilAPIRequest $request)
    {
        $input = $request->all();

        $tahsil = $this->tahsilRepository->create($input);

        return $this->sendResponse($tahsil->toArray(), 'Tahsil saved successfully');
    }

    /**
     * Display the specified Tahsil.
     * GET|HEAD /tahsils/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tahsil $tahsil */
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            return $this->sendError('Tahsil not found');
        }

        return $this->sendResponse($tahsil->toArray(), 'Tahsil retrieved successfully');
    }

    /**
     * Update the specified Tahsil in storage.
     * PUT/PATCH /tahsils/{id}
     *
     * @param int $id
     * @param UpdateTahsilAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTahsilAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tahsil $tahsil */
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            return $this->sendError('Tahsil not found');
        }

        $tahsil = $this->tahsilRepository->update($input, $id);

        return $this->sendResponse($tahsil->toArray(), 'Tahsil updated successfully');
    }

    /**
     * Remove the specified Tahsil from storage.
     * DELETE /tahsils/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tahsil $tahsil */
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            return $this->sendError('Tahsil not found');
        }

        $tahsil->delete();

        return $this->sendSuccess('Tahsil deleted successfully');
    }
}
