<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMaterialTypeRequest;
use App\Http\Requests\UpdateMaterialTypeRequest;
use App\Repositories\MaterialTypeRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MaterialTypeController extends InfyOmBaseController
{
    /** @var  MaterialTypeRepository */
    private $materialTypeRepository;

    public function __construct(MaterialTypeRepository $materialTypeRepo)
    {
        $this->materialTypeRepository = $materialTypeRepo;
    }

    /**
     * Display a listing of the MaterialType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->materialTypeRepository->pushCriteria(new RequestCriteria($request));
        $materialTypes = $this->materialTypeRepository->all();

        return view('materialTypes.index')
            ->with('materialTypes', $materialTypes);
    }

    /**
     * Show the form for creating a new MaterialType.
     *
     * @return Response
     */
    public function create()
    {
        return view('materialTypes.create');
    }

    /**
     * Store a newly created MaterialType in storage.
     *
     * @param CreateMaterialTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateMaterialTypeRequest $request)
    {
        $input = $request->all();

        $materialType = $this->materialTypeRepository->create($input);

        Flash::success('MaterialType saved successfully.');

        return redirect(route('materialTypes.index'));
    }

    /**
     * Display the specified MaterialType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materialType = $this->materialTypeRepository->findWithoutFail($id);

        if (empty($materialType)) {
            Flash::error('MaterialType not found');

            return redirect(route('materialTypes.index'));
        }

        return view('materialTypes.show')->with('materialType', $materialType);
    }

    /**
     * Show the form for editing the specified MaterialType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materialType = $this->materialTypeRepository->findWithoutFail($id);

        if (empty($materialType)) {
            Flash::error('MaterialType not found');

            return redirect(route('materialTypes.index'));
        }

        return view('materialTypes.edit')->with('materialType', $materialType);
    }

    /**
     * Update the specified MaterialType in storage.
     *
     * @param  int              $id
     * @param UpdateMaterialTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaterialTypeRequest $request)
    {
        $materialType = $this->materialTypeRepository->findWithoutFail($id);

        if (empty($materialType)) {
            Flash::error('MaterialType not found');

            return redirect(route('materialTypes.index'));
        }

        $materialType = $this->materialTypeRepository->update($request->all(), $id);

        Flash::success('MaterialType updated successfully.');

        return redirect(route('materialTypes.index'));
    }

    /**
     * Remove the specified MaterialType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materialType = $this->materialTypeRepository->findWithoutFail($id);

        if (empty($materialType)) {
            Flash::error('MaterialType not found');

            return redirect(route('materialTypes.index'));
        }

        $this->materialTypeRepository->delete($id);

        Flash::success('MaterialType deleted successfully.');

        return redirect(route('materialTypes.index'));
    }
}
