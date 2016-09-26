<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateWorkAssignmentDetailRequest;
use App\Http\Requests\UpdateWorkAssignmentDetailRequest;
use App\Repositories\WorkAssignmentDetailRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorkAssignmentDetailController extends InfyOmBaseController
{
    /** @var  WorkAssignmentDetailRepository */
    private $workAssignmentDetailRepository;

    public function __construct(WorkAssignmentDetailRepository $workAssignmentDetailRepo)
    {
        $this->workAssignmentDetailRepository = $workAssignmentDetailRepo;
    }

    /**
     * Display a listing of the WorkAssignmentDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workAssignmentDetailRepository->pushCriteria(new RequestCriteria($request));
        $workAssignmentDetails = $this->workAssignmentDetailRepository->all();

        return view('workAssignmentDetails.index')
            ->with('workAssignmentDetails', $workAssignmentDetails);
    }

    /**
     * Show the form for creating a new WorkAssignmentDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('workAssignmentDetails.create');
    }

    /**
     * Store a newly created WorkAssignmentDetail in storage.
     *
     * @param CreateWorkAssignmentDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkAssignmentDetailRequest $request)
    {
        $input = $request->all();

        $workAssignmentDetail = $this->workAssignmentDetailRepository->create($input);

        Flash::success('WorkAssignmentDetail saved successfully.');

        return redirect(route('workAssignmentDetails.index'));
    }

    /**
     * Display the specified WorkAssignmentDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workAssignmentDetail = $this->workAssignmentDetailRepository->findWithoutFail($id);

        if (empty($workAssignmentDetail)) {
            Flash::error('WorkAssignmentDetail not found');

            return redirect(route('workAssignmentDetails.index'));
        }

        return view('workAssignmentDetails.show')->with('workAssignmentDetail', $workAssignmentDetail);
    }

    /**
     * Show the form for editing the specified WorkAssignmentDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workAssignmentDetail = $this->workAssignmentDetailRepository->findWithoutFail($id);

        if (empty($workAssignmentDetail)) {
            Flash::error('WorkAssignmentDetail not found');

            return redirect(route('workAssignmentDetails.index'));
        }

        return view('workAssignmentDetails.edit')->with('workAssignmentDetail', $workAssignmentDetail);
    }

    /**
     * Update the specified WorkAssignmentDetail in storage.
     *
     * @param  int              $id
     * @param UpdateWorkAssignmentDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkAssignmentDetailRequest $request)
    {
        $workAssignmentDetail = $this->workAssignmentDetailRepository->findWithoutFail($id);

        if (empty($workAssignmentDetail)) {
            Flash::error('WorkAssignmentDetail not found');

            return redirect(route('workAssignmentDetails.index'));
        }

        $workAssignmentDetail = $this->workAssignmentDetailRepository->update($request->all(), $id);

        Flash::success('WorkAssignmentDetail updated successfully.');

        return redirect(route('workAssignmentDetails.index'));
    }

    /**
     * Remove the specified WorkAssignmentDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workAssignmentDetail = $this->workAssignmentDetailRepository->findWithoutFail($id);

        if (empty($workAssignmentDetail)) {
            Flash::error('WorkAssignmentDetail not found');

            return redirect(route('workAssignmentDetails.index'));
        }

        $this->workAssignmentDetailRepository->delete($id);

        Flash::success('WorkAssignmentDetail deleted successfully.');

        return redirect(route('workAssignmentDetails.index'));
    }
}
