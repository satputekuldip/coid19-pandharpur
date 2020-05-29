<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEntryPointAPIRequest;
use App\Http\Requests\API\UpdateEntryPointAPIRequest;
use App\Models\EntryPoint;
use App\Repositories\EntryPointRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EntryPointController
 * @package App\Http\Controllers\API
 */

class EntryPointAPIController extends AppBaseController
{
    /** @var  EntryPointRepository */
    private $entryPointRepository;

    public function __construct(EntryPointRepository $entryPointRepo)
    {
        $this->entryPointRepository = $entryPointRepo;
    }

    /**
     * Display a listing of the EntryPoint.
     * GET|HEAD /entryPoints
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $entryPoints = $this->entryPointRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($entryPoints->toArray(), 'Entry Points retrieved successfully');
    }

    /**
     * Store a newly created EntryPoint in storage.
     * POST /entryPoints
     *
     * @param CreateEntryPointAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEntryPointAPIRequest $request)
    {
        $input = $request->all();

        $entryPoint = $this->entryPointRepository->create($input);

        return $this->sendResponse($entryPoint->toArray(), 'Entry Point saved successfully');
    }

    /**
     * Display the specified EntryPoint.
     * GET|HEAD /entryPoints/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EntryPoint $entryPoint */
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            return $this->sendError('Entry Point not found');
        }

        return $this->sendResponse($entryPoint->toArray(), 'Entry Point retrieved successfully');
    }

    /**
     * Update the specified EntryPoint in storage.
     * PUT/PATCH /entryPoints/{id}
     *
     * @param int $id
     * @param UpdateEntryPointAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntryPointAPIRequest $request)
    {
        $input = $request->all();

        /** @var EntryPoint $entryPoint */
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            return $this->sendError('Entry Point not found');
        }

        $entryPoint = $this->entryPointRepository->update($input, $id);

        return $this->sendResponse($entryPoint->toArray(), 'EntryPoint updated successfully');
    }

    /**
     * Remove the specified EntryPoint from storage.
     * DELETE /entryPoints/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EntryPoint $entryPoint */
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            return $this->sendError('Entry Point not found');
        }

        $entryPoint->delete();

        return $this->sendSuccess('Entry Point deleted successfully');
    }
}
