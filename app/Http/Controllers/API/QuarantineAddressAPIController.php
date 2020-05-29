<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuarantineAddressAPIRequest;
use App\Http\Requests\API\UpdateQuarantineAddressAPIRequest;
use App\Models\QuarantineAddress;
use App\Repositories\QuarantineAddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QuarantineAddressController
 * @package App\Http\Controllers\API
 */

class QuarantineAddressAPIController extends AppBaseController
{
    /** @var  QuarantineAddressRepository */
    private $quarantineAddressRepository;

    public function __construct(QuarantineAddressRepository $quarantineAddressRepo)
    {
        $this->quarantineAddressRepository = $quarantineAddressRepo;
    }

    /**
     * Display a listing of the QuarantineAddress.
     * GET|HEAD /quarantineAddresses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $quarantineAddresses = $this->quarantineAddressRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($quarantineAddresses->toArray(), 'Quarantine Addresses retrieved successfully');
    }

    /**
     * Store a newly created QuarantineAddress in storage.
     * POST /quarantineAddresses
     *
     * @param CreateQuarantineAddressAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuarantineAddressAPIRequest $request)
    {
        $input = $request->all();

        $quarantineAddress = $this->quarantineAddressRepository->create($input);

        return $this->sendResponse($quarantineAddress->toArray(), 'Quarantine Address saved successfully');
    }

    /**
     * Display the specified QuarantineAddress.
     * GET|HEAD /quarantineAddresses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var QuarantineAddress $quarantineAddress */
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            return $this->sendError('Quarantine Address not found');
        }

        return $this->sendResponse($quarantineAddress->toArray(), 'Quarantine Address retrieved successfully');
    }

    /**
     * Update the specified QuarantineAddress in storage.
     * PUT/PATCH /quarantineAddresses/{id}
     *
     * @param int $id
     * @param UpdateQuarantineAddressAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuarantineAddressAPIRequest $request)
    {
        $input = $request->all();

        /** @var QuarantineAddress $quarantineAddress */
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            return $this->sendError('Quarantine Address not found');
        }

        $quarantineAddress = $this->quarantineAddressRepository->update($input, $id);

        return $this->sendResponse($quarantineAddress->toArray(), 'QuarantineAddress updated successfully');
    }

    /**
     * Remove the specified QuarantineAddress from storage.
     * DELETE /quarantineAddresses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var QuarantineAddress $quarantineAddress */
        $quarantineAddress = $this->quarantineAddressRepository->find($id);

        if (empty($quarantineAddress)) {
            return $this->sendError('Quarantine Address not found');
        }

        $quarantineAddress->delete();

        return $this->sendSuccess('Quarantine Address deleted successfully');
    }
}
