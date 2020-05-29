<?php

namespace App\Http\Controllers;

use App\DataTables\TahsilDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTahsilRequest;
use App\Http\Requests\UpdateTahsilRequest;
use App\Repositories\TahsilRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TahsilController extends AppBaseController
{
    /** @var  TahsilRepository */
    private $tahsilRepository;

    public function __construct(TahsilRepository $tahsilRepo)
    {
        $this->tahsilRepository = $tahsilRepo;
    }

    /**
     * Display a listing of the Tahsil.
     *
     * @param TahsilDataTable $tahsilDataTable
     * @return Response
     */
    public function index(TahsilDataTable $tahsilDataTable)
    {
        return $tahsilDataTable->render('tahsils.index');
    }

    /**
     * Show the form for creating a new Tahsil.
     *
     * @return Response
     */
    public function create()
    {
        return view('tahsils.create');
    }

    /**
     * Store a newly created Tahsil in storage.
     *
     * @param CreateTahsilRequest $request
     *
     * @return Response
     */
    public function store(CreateTahsilRequest $request)
    {
        $input = $request->all();

        $tahsil = $this->tahsilRepository->create($input);

        Flash::success('Tahsil saved successfully.');

        return redirect(route('tahsils.index'));
    }

    /**
     * Display the specified Tahsil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            Flash::error('Tahsil not found');

            return redirect(route('tahsils.index'));
        }

        return view('tahsils.show')->with('tahsil', $tahsil);
    }

    /**
     * Show the form for editing the specified Tahsil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            Flash::error('Tahsil not found');

            return redirect(route('tahsils.index'));
        }

        return view('tahsils.edit')->with('tahsil', $tahsil);
    }

    /**
     * Update the specified Tahsil in storage.
     *
     * @param  int              $id
     * @param UpdateTahsilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTahsilRequest $request)
    {
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            Flash::error('Tahsil not found');

            return redirect(route('tahsils.index'));
        }

        $tahsil = $this->tahsilRepository->update($request->all(), $id);

        Flash::success('Tahsil updated successfully.');

        return redirect(route('tahsils.index'));
    }

    /**
     * Remove the specified Tahsil from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tahsil = $this->tahsilRepository->find($id);

        if (empty($tahsil)) {
            Flash::error('Tahsil not found');

            return redirect(route('tahsils.index'));
        }

        $this->tahsilRepository->delete($id);

        Flash::success('Tahsil deleted successfully.');

        return redirect(route('tahsils.index'));
    }
}
