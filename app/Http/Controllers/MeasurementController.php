<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMeasurementRequest;
use App\Http\Requests\UpdateMeasurementRequest;
use App\Repositories\MeasurementRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MeasurementController extends InfyOmBaseController
{
    /** @var  MeasurementRepository */
    private $measurementRepository;

    public function __construct(MeasurementRepository $measurementRepo)
    {
        $this->measurementRepository = $measurementRepo;
    }

    /**
     * Display a listing of the Measurement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->measurementRepository->pushCriteria(new RequestCriteria($request));
        $measurements = $this->measurementRepository->all();

        return view('measurements.index')
            ->with('measurements', $measurements);
    }

    /**
     * Show the form for creating a new Measurement.
     *
     * @return Response
     */
    public function create()
    {
        return view('measurements.create');
    }

    /**
     * Store a newly created Measurement in storage.
     *
     * @param CreateMeasurementRequest $request
     *
     * @return Response
     */
    public function store(CreateMeasurementRequest $request)
    {
        $input = $request->all();

        $measurement = $this->measurementRepository->create($input);

        Flash::success('Measurement saved successfully.');

        return redirect(route('measurements.index'));
    }

    /**
     * Display the specified Measurement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $measurement = $this->measurementRepository->findWithoutFail($id);

        if (empty($measurement)) {
            Flash::error('Measurement not found');

            return redirect(route('measurements.index'));
        }

        return view('measurements.show')->with('measurement', $measurement);
    }

    /**
     * Show the form for editing the specified Measurement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $measurement = $this->measurementRepository->findWithoutFail($id);

        if (empty($measurement)) {
            Flash::error('Measurement not found');

            return redirect(route('measurements.index'));
        }

        return view('measurements.edit')->with('measurement', $measurement);
    }

    /**
     * Update the specified Measurement in storage.
     *
     * @param  int              $id
     * @param UpdateMeasurementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeasurementRequest $request)
    {
        $measurement = $this->measurementRepository->findWithoutFail($id);

        if (empty($measurement)) {
            Flash::error('Measurement not found');

            return redirect(route('measurements.index'));
        }

        $measurement = $this->measurementRepository->update($request->all(), $id);

        Flash::success('Measurement updated successfully.');

        return redirect(route('measurements.index'));
    }

    /**
     * Remove the specified Measurement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $measurement = $this->measurementRepository->findWithoutFail($id);

        if (empty($measurement)) {
            Flash::error('Measurement not found');

            return redirect(route('measurements.index'));
        }

        $this->measurementRepository->delete($id);

        Flash::success('Measurement deleted successfully.');

        return redirect(route('measurements.index'));
    }
}
