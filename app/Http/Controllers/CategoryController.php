<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoryController extends InfyOmBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->with('parentCategory')->all();

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->lists('title', 'id')->where('deleted_at', null);
        return view('categories.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryRepository->create($input);
        if(!empty($input['image']) ){
            $image = $request->file('image');
            if($image->isValid()) {
                $destinationPath = public_path().'/images/categories/';
                $fileName = $category->id . '.'.$image->getClientOriginalExtension();
                $filePath = '/images/categories/' . $fileName;
                $this->upload($image, $destinationPath, $fileName);

                $category->image = $filePath;
                $category->update();
            }
        }
        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);
        $categories = $this->categoryRepository->with('parentCategory')->all();

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')
            ->with('category', $category)
            ->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        $categories = $this->categoryRepository->lists('title', 'id')->where('deleted_at', null);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')
            ->with('category', $category)
            ->with('categories', $categories);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);


        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        $input = $request->all();
        if(!empty($input['image']) ){
            $image = $request->file('image');
            $destinationPath = public_path().'/images/categories/';
            $fileName = $category->id . '.'.$image->getClientOriginalExtension();
            $filePath = '/images/categories/' . $fileName;
            $this->upload($image, $destinationPath, $fileName);

            $category->image = $filePath;
            $category->update();
        }

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);



        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $relatedCategories = DB::select("SELECT * FROM products WHERE category = $id OR sub_category = $id");
        if(count($relatedCategories)>0){
            Flash::error('The Category is linked with Product and cannot be deleted.');
        }
        else
        {
            $this->categoryRepository->delete($id);

            Flash::success('Category deleted successfully.');
        }

        return redirect(route('categories.index'));
    }
}
