<?php

namespace App\Http\Controllers;

use App\DataTables\InstituteAddressesTable;
use App\DataTables\QuarantineAddressDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuarantineAddressRequest;
use App\Http\Requests\UpdateQuarantineAddressRequest;
use App\Models\District;
use App\Models\State;
use App\Models\Tahsil;
use App\Repositories\QuarantineAddressRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class QuarantineAddressController extends AppBaseController
{
    /** @var  QuarantineAddressRepository */
    private $quarantineAddressRepository;

    public function __construct(QuarantineAddressRepository $quarantineAddressRepo)
    {
        $this->quarantineAddressRepository = $quarantineAddressRepo;
    }

    /**
     * Display a listing of the QuarantineAddress.
     *
     * @param QuarantineAddressDataTable $quarantineAddressDataTable
     * @return Response
     */
    public function index(QuarantineAddressDataTable $quarantineAddressDataTable)
    {
        return $quarantineAddressDataTable->render('quarantine_addresses.index');
    }

    public function institutes(InstituteAddressesTable $instituteAddressesTable)
    {
        return $instituteAddressesTable->render('quarantine_addresses.institute_index');
    }

    /**
     * Show the form for creating a new QuarantineAddress.
     *
     * @return Response
     */
    public function create()
    {
        $states = State::pluck('name', 'id')->toArray();
        $districts = District::pluck('name', 'id')->toArray();
        $tahasils = Tahsil::pluck('name', 'id')->toArray();
        return view('quarantine_addresses.create', compact('states', 'entryPoints', 'districts', 'tahasils'));
    }

    /**
     * Store a newly created QuarantineAddress in storage.
     *
     * @param CreateQuarantineAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateQuarantineAddressRequest $request)
    {
        $input = $request->all();

        $input['state'] = State::find($input['state_id'])->name;
        $input['district'] = District::find($input['district_id'])->name;
        $input['tahasil'] = Tahsil::find($input['tahasil_id'])->name;

        $quarantineAddress = $this->quarantineAddressRepository->create($input);

        Flash::success('Quarantine Address saved successfully.');

        return redirect(route('quarantineAddresses.index'));
    }

    /**
     * Display the specified QuarantineAddress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            Flash::error('Quarantine Address not found');

            return redirect(route('quarantineAddresses.index'));
        }

        return view('quarantine_addresses.show')->with('quarantineAddress', $quarantineAddress);
    }

    /**
     * Show the form for editing the specified QuarantineAddress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            Flash::error('Quarantine Address not found');

            return redirect(route('quarantineAddresses.index'));
        }

        return view('quarantine_addresses.edit')->with('quarantineAddress', $quarantineAddress);
    }

    /**
     * Update the specified QuarantineAddress in storage.
     *
     * @param int $id
     * @param UpdateQuarantineAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuarantineAddressRequest $request)
    {
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            Flash::error('Quarantine Address not found');

            return redirect(route('quarantineAddresses.index'));
        }

        $quarantineAddress = $this->quarantineAddressRepository->update($request->all(), $id);

        Flash::success('Quarantine Address updated successfully.');

        return redirect(route('quarantineAddresses.index'));
    }

    /**
     * Remove the specified QuarantineAddress from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            Flash::error('Quarantine Address not found');

            return redirect(route('quarantineAddresses.index'));
        }

        $this->quarantineAddressRepository->delete($id);

        Flash::success('Quarantine Address deleted successfully.');

        return redirect(route('quarantineAddresses.index'));
    }
}
