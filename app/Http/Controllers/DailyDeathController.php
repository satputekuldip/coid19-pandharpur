<?php

namespace App\Http\Controllers;

use App\DataTables\DailyDeathDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDailyDeathRequest;
use App\Http\Requests\UpdateDailyDeathRequest;
use App\Repositories\DailyDeathRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DailyDeathController extends AppBaseController
{
    /** @var  DailyDeathRepository */
    private $dailyDeathRepository;

    public function __construct(DailyDeathRepository $dailyDeathRepo)
    {
        $this->dailyDeathRepository = $dailyDeathRepo;
    }

    /**
     * Display a listing of the DailyDeath.
     *
     * @param DailyDeathDataTable $dailyDeathDataTable
     * @return Response
     */
    public function index(DailyDeathDataTable $dailyDeathDataTable)
    {
        return $dailyDeathDataTable->render('daily_deaths.index');
    }

    /**
     * Show the form for creating a new DailyDeath.
     *
     * @return Response
     */
    public function create()
    {
        return view('daily_deaths.create');
    }

    /**
     * Store a newly created DailyDeath in storage.
     *
     * @param CreateDailyDeathRequest $request
     *
     * @return Response
     */
    public function store(CreateDailyDeathRequest $request)
    {
        $input = $request->all();

        $dailyDeath = $this->dailyDeathRepository->create($input);

        Flash::success('Daily Death saved successfully.');

        return redirect(route('dailyDeaths.index'));
    }

    /**
     * Display the specified DailyDeath.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            Flash::error('Daily Death not found');

            return redirect(route('dailyDeaths.index'));
        }

        return view('daily_deaths.show')->with('dailyDeath', $dailyDeath);
    }

    /**
     * Show the form for editing the specified DailyDeath.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            Flash::error('Daily Death not found');

            return redirect(route('dailyDeaths.index'));
        }

        return view('daily_deaths.edit')->with('dailyDeath', $dailyDeath);
    }

    /**
     * Update the specified DailyDeath in storage.
     *
     * @param  int              $id
     * @param UpdateDailyDeathRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDailyDeathRequest $request)
    {
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            Flash::error('Daily Death not found');

            return redirect(route('dailyDeaths.index'));
        }

        $dailyDeath = $this->dailyDeathRepository->update($request->all(), $id);

        Flash::success('Daily Death updated successfully.');

        return redirect(route('dailyDeaths.index'));
    }

    /**
     * Remove the specified DailyDeath from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dailyDeath = $this->dailyDeathRepository->find($id);

        if (empty($dailyDeath)) {
            Flash::error('Daily Death not found');

            return redirect(route('dailyDeaths.index'));
        }

        $this->dailyDeathRepository->delete($id);

        Flash::success('Daily Death deleted successfully.');

        return redirect(route('dailyDeaths.index'));
    }
}
