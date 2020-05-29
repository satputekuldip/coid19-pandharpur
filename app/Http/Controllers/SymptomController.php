<?php

namespace App\Http\Controllers;

use App\DataTables\SymptomDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSymptomRequest;
use App\Http\Requests\UpdateSymptomRequest;
use App\Repositories\SymptomRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SymptomController extends AppBaseController
{
    /** @var  SymptomRepository */
    private $symptomRepository;

    public function __construct(SymptomRepository $symptomRepo)
    {
        $this->symptomRepository = $symptomRepo;
    }

    /**
     * Display a listing of the Symptom.
     *
     * @param SymptomDataTable $symptomDataTable
     * @return Response
     */
    public function index(SymptomDataTable $symptomDataTable)
    {
        return $symptomDataTable->render('symptoms.index');
    }

    /**
     * Show the form for creating a new Symptom.
     *
     * @return Response
     */
    public function create()
    {
        return view('symptoms.create');
    }

    /**
     * Store a newly created Symptom in storage.
     *
     * @param CreateSymptomRequest $request
     *
     * @return Response
     */
    public function store(CreateSymptomRequest $request)
    {
        $input = $request->all();

        $symptom = $this->symptomRepository->create($input);

        Flash::success('Symptom saved successfully.');

        return redirect(route('symptoms.index'));
    }

    /**
     * Display the specified Symptom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            Flash::error('Symptom not found');

            return redirect(route('symptoms.index'));
        }

        return view('symptoms.show')->with('symptom', $symptom);
    }

    /**
     * Show the form for editing the specified Symptom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            Flash::error('Symptom not found');

            return redirect(route('symptoms.index'));
        }

        return view('symptoms.edit')->with('symptom', $symptom);
    }

    /**
     * Update the specified Symptom in storage.
     *
     * @param  int              $id
     * @param UpdateSymptomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSymptomRequest $request)
    {
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            Flash::error('Symptom not found');

            return redirect(route('symptoms.index'));
        }

        $symptom = $this->symptomRepository->update($request->all(), $id);

        Flash::success('Symptom updated successfully.');

        return redirect(route('symptoms.index'));
    }

    /**
     * Remove the specified Symptom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $symptom = $this->symptomRepository->find($id);

        if (empty($symptom)) {
            Flash::error('Symptom not found');

            return redirect(route('symptoms.index'));
        }

        $this->symptomRepository->delete($id);

        Flash::success('Symptom deleted successfully.');

        return redirect(route('symptoms.index'));
    }
}
