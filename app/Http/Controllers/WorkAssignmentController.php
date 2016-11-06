<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateWorkAssignmentRequest;
use App\Http\Requests\UpdateWorkAssignmentRequest;
use App\Models\Kaligard;
use App\Repositories\WorkAssignmentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorkAssignmentController extends InfyOmBaseController
{
    /** @var  WorkAssignmentRepository */
    private $workAssignmentRepository;

    public function __construct(WorkAssignmentRepository $workAssignmentRepo)
    {
        $this->workAssignmentRepository = $workAssignmentRepo;
    }

    /**
     * Display a listing of the WorkAssignment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workAssignmentRepository->pushCriteria(new RequestCriteria($request));
        $workAssignments = DB::select("SELECT k.*, k.code as kaligard_code, p.*, p.code as product_code,c.title as category, sc.title as sub_category FROM kaligards k 
                                        INNER JOIN work_assignments wa ON k.id=wa.kaligard_id
                                        INNER JOIN products p ON p.id=wa.product_id
                                        INNER JOIN categories c ON c.id=p.category
                                        INNER JOIN categories sc ON sc.id=p.sub_category
                                        ");
        /*$workAssignments = Kaligard::with('products')->get()->toArray();*/

        return view('workAssignments.index')
            ->with('workAssignments', $workAssignments);
    }

    /**
     * Show the form for creating a new WorkAssignment.
     *
     * @return Response
     */
    public function create()
    {
        return view('workAssignments.create');
    }

    /**
     * Store a newly created WorkAssignment in storage.
     *
     * @param CreateWorkAssignmentRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkAssignmentRequest $request)
    {
        $input = $request->all();

        $workAssignment = $this->workAssignmentRepository->create($input);

        Flash::success('WorkAssignment saved successfully.');

        return redirect(route('workAssignments.index'));
    }

    /**
     * Display the specified WorkAssignment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workAssignment = $this->workAssignmentRepository->findWithoutFail($id);

        if (empty($workAssignment)) {
            Flash::error('WorkAssignment not found');

            return redirect(route('workAssignments.index'));
        }

        return view('workAssignments.show')->with('workAssignment', $workAssignment);
    }

    /**
     * Show the form for editing the specified WorkAssignment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workAssignment = $this->workAssignmentRepository->findWithoutFail($id);

        if (empty($workAssignment)) {
            Flash::error('WorkAssignment not found');

            return redirect(route('workAssignments.index'));
        }

        return view('workAssignments.edit')->with('workAssignment', $workAssignment);
    }

    /**
     * Update the specified WorkAssignment in storage.
     *
     * @param  int              $id
     * @param UpdateWorkAssignmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkAssignmentRequest $request)
    {
        $workAssignment = $this->workAssignmentRepository->findWithoutFail($id);

        if (empty($workAssignment)) {
            Flash::error('WorkAssignment not found');

            return redirect(route('workAssignments.index'));
        }

        $workAssignment = $this->workAssignmentRepository->update($request->all(), $id);

        Flash::success('WorkAssignment updated successfully.');

        return redirect(route('workAssignments.index'));
    }

    /**
     * Remove the specified WorkAssignment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workAssignment = $this->workAssignmentRepository->findWithoutFail($id);

        if (empty($workAssignment)) {
            Flash::error('WorkAssignment not found');

            return redirect(route('workAssignments.index'));
        }

        $this->workAssignmentRepository->delete($id);

        Flash::success('WorkAssignment deleted successfully.');

        return redirect(route('workAssignments.index'));
    }
}
