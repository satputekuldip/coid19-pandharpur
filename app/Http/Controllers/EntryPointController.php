<?php

namespace App\Http\Controllers;

use App\DataTables\EntryPointDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEntryPointRequest;
use App\Http\Requests\UpdateEntryPointRequest;
use App\Repositories\EntryPointRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EntryPointController extends AppBaseController
{
    /** @var  EntryPointRepository */
    private $entryPointRepository;

    public function __construct(EntryPointRepository $entryPointRepo)
    {
        $this->entryPointRepository = $entryPointRepo;
    }

    /**
     * Display a listing of the EntryPoint.
     *
     * @param EntryPointDataTable $entryPointDataTable
     * @return Response
     */
    public function index(EntryPointDataTable $entryPointDataTable)
    {
        return $entryPointDataTable->render('entry_points.index');
    }

    /**
     * Show the form for creating a new EntryPoint.
     *
     * @return Response
     */
    public function create()
    {
        return view('entry_points.create');
    }

    /**
     * Store a newly created EntryPoint in storage.
     *
     * @param CreateEntryPointRequest $request
     *
     * @return Response
     */
    public function store(CreateEntryPointRequest $request)
    {
        $input = $request->all();

        $entryPoint = $this->entryPointRepository->create($input);

        Flash::success('Entry Point saved successfully.');

        return redirect(route('entryPoints.index'));
    }

    /**
     * Display the specified EntryPoint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            Flash::error('Entry Point not found');

            return redirect(route('entryPoints.index'));
        }

        return view('entry_points.show')->with('entryPoint', $entryPoint);
    }

    /**
     * Show the form for editing the specified EntryPoint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            Flash::error('Entry Point not found');

            return redirect(route('entryPoints.index'));
        }

        return view('entry_points.edit')->with('entryPoint', $entryPoint);
    }

    /**
     * Update the specified EntryPoint in storage.
     *
     * @param  int              $id
     * @param UpdateEntryPointRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntryPointRequest $request)
    {
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            Flash::error('Entry Point not found');

            return redirect(route('entryPoints.index'));
        }

        $entryPoint = $this->entryPointRepository->update($request->all(), $id);

        Flash::success('Entry Point updated successfully.');

        return redirect(route('entryPoints.index'));
    }

    /**
     * Remove the specified EntryPoint from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entryPoint = $this->entryPointRepository->find($id);

        if (empty($entryPoint)) {
            Flash::error('Entry Point not found');

            return redirect(route('entryPoints.index'));
        }

        $this->entryPointRepository->delete($id);

        Flash::success('Entry Point deleted successfully.');

        return redirect(route('entryPoints.index'));
    }
}
