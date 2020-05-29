<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDailyDeathAPIRequest;
use App\Http\Requests\API\UpdateDailyDeathAPIRequest;
use App\Models\DailyDeath;
use App\Repositories\DailyDeathRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DailyDeathController
 * @package App\Http\Controllers\API
 */

class DailyDeathAPIController extends AppBaseController
{
    /** @var  DailyDeathRepository */
    private $dailyDeathRepository;

    public function __construct(DailyDeathRepository $dailyDeathRepo)
    {
        $this->dailyDeathRepository = $dailyDeathRepo;
    }

    /**
     * Display a listing of the DailyDeath.
     * GET|HEAD /dailyDeaths
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dailyDeaths = $this->dailyDeathRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dailyDeaths->toArray(), 'Daily Deaths retrieved successfully');
    }

    /**
     * Store a newly created DailyDeath in storage.
     * POST /dailyDeaths
     *
     * @param CreateDailyDeathAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDailyDeathAPIRequest $request)
    {
        $input = $request->all();

        $dailyDeath = $this->dailyDeathRepository->create($input);

        return $this->sendResponse($dailyDeath->toArray(), 'Daily Death saved successfully');
    }

    /**
     * Display the specified DailyDeath.
     * GET|HEAD /dailyDeaths/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DailyDeath $dailyDeath */
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            return $this->sendError('Daily Death not found');
        }

        return $this->sendResponse($dailyDeath->toArray(), 'Daily Death retrieved successfully');
    }

    /**
     * Update the specified DailyDeath in storage.
     * PUT/PATCH /dailyDeaths/{id}
     *
     * @param int $id
     * @param UpdateDailyDeathAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDailyDeathAPIRequest $request)
    {
        $input = $request->all();

        /** @var DailyDeath $dailyDeath */
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            return $this->sendError('Daily Death not found');
        }

        $dailyDeath = $this->dailyDeathRepository->update($input, $id);

        return $this->sendResponse($dailyDeath->toArray(), 'DailyDeath updated successfully');
    }

    /**
     * Remove the specified DailyDeath from storage.
     * DELETE /dailyDeaths/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DailyDeath $dailyDeath */
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            return $this->sendError('Daily Death not found');
        }

        $dailyDeath->delete();

        return $this->sendSuccess('Daily Death deleted successfully');
    }
}
