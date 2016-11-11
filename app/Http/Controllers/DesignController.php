<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDesignRequest;
use App\Http\Requests\UpdateDesignRequest;
use App\Models\Category;
use App\Models\Design;
use App\Repositories\DesignRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DesignController extends InfyOmBaseController
{
    /** @var  DesignRepository */
    private $designRepository;

    public function __construct(DesignRepository $designRepo)
    {
        $this->designRepository = $designRepo;
    }

    /**
     * Display a listing of the Design.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mainCategory = Category::where('parent_id', 0)->whereNotIn('id',[0])->get()->toArray();
        $subCategory = Category::whereNotIn('parent_id', array_keys($mainCategory))->whereNotIn('id',[0])->get()->toArray();
        $this->designRepository->pushCriteria(new RequestCriteria($request));
        $designs = $this->designRepository->with('categories', 'subCategories')->all();
        dd($designs);
        return view('designs.index')
            ->withMainCategory($mainCategory)
            ->withSubCategory($subCategory)
            ->withDesigns($designs);
    }

    /**
     * Show the form for creating a new Design.
     *
     * @return Response
     */
    public function create()
    {
        $mainCategory = Category::where('parent_id', 0)->whereNotIn('id',[0])->get()->toArray();
        $subCategory = Category::whereNotIn('parent_id', array_keys($mainCategory))->whereNotIn('id',[0])->get()->toArray();
        return view('designs.create')
            ->withMainCategory($mainCategory)
            ->withSubCategory($subCategory);
    }

    /**
     * Store a newly created Design in storage.
     *
     * @param CreateDesignRequest $request
     *
     * @return Response
     */
    public function store(CreateDesignRequest $request)
    {
        $input = $request->all();

        $design = $this->designRepository->create($input);

        if(!empty($input['image']) ){
            $image = $request->file('image');
            if($image->isValid()) {
                $destinationPath = public_path().'/images/designs/';
                $fileName = $design->id . '.'.$image->getClientOriginalExtension();
                $filePath = '/images/designs/' . $fileName;
                $this->upload($image, $destinationPath, $fileName);

                $design->image = $filePath;
                $design->update();
            }
        }

        Flash::success('Design saved successfully.');

        return redirect(route('designs.index'));
    }

    /**
     * Display the specified Design.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $design = $this->designRepository->findWithoutFail($id);

        if (empty($design)) {
            Flash::error('Design not found');

            return redirect(route('designs.index'));
        }

        return view('designs.show')->with('design', $design);
    }

    /**
     * Show the form for editing the specified Design.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $design = $this->designRepository->findWithoutFail($id);

        if (empty($design)) {
            Flash::error('Design not found');

            return redirect(route('designs.index'));
        }

        return view('designs.edit')->with('design', $design);
    }

    /**
     * Update the specified Design in storage.
     *
     * @param  int              $id
     * @param UpdateDesignRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDesignRequest $request)
    {
        $design = $this->designRepository->findWithoutFail($id);

        if (empty($design)) {
            Flash::error('Design not found');

            return redirect(route('designs.index'));
        }

        $design = $this->designRepository->update($request->all(), $id);

        Flash::success('Design updated successfully.');

        return redirect(route('designs.index'));
    }

    /**
     * Remove the specified Design from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $design = $this->designRepository->findWithoutFail($id);

        if (empty($design)) {
            Flash::error('Design not found');

            return redirect(route('designs.index'));
        }

        $this->designRepository->delete($id);

        Flash::success('Design deleted successfully.');

        return redirect(route('designs.index'));
    }
}
