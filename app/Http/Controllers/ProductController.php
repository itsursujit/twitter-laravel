<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Design;
use App\Models\Inventory;
use App\Models\Kaligard;
use App\Models\MaterialType;
use App\Models\Shop;
use App\Models\WorkAssignment;
use App\Models\WorkAssignmentDetail;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends InfyOmBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $cat = $request->get('cat');
        $sts = $status;
        switch ($status){
            case "not-started":
                $status = "Not Started";
                break;
            case "in-progress":
                $status = "In Progress";
                break;
            case "completed":
                $status = "Completed";
                break;
            default:
                $status = null;
                break;
        }
        if(!empty($status)) {
            $this->productRepository->pushCriteria(new RequestCriteria($request));
            if(!empty($cat)){
                $products = $this->productRepository->with(['design', 'design.categories', 'design.subCategories'])->findWhere(["status" => $status ])->all();
            }
            else{
                $products = $this->productRepository->with(['design', 'design.categories', 'design.subCategories'])->findWhere(["status" => $status ])->all();
            }

        }
        else{
            $this->productRepository->pushCriteria(new RequestCriteria($request));
            $products = $this->productRepository->with(['design', 'design.categories', 'design.subCategories'])->all();
        }

        return view('products.index')
            ->with('products', $products)
            ->withStatus($sts);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $mainCategory = Category::where('parent_id', 0)->whereNotIn('id',[0])->get()->toArray();
        $subCategory = Category::whereNotIn('parent_id', array_keys($mainCategory))->whereNotIn('id',[0])->get()->toArray();

        //$mainCategory = Category::where('parent_id', 0)->whereNotIn('id',[0])->lists('title', 'id')->toArray();
        //$subCategory = Category::whereIn('parent_id', array_keys($mainCategory))->lists('title', 'id')->toArray();
        $kaligards = Kaligard::where('is_deleted', 0)->get()->toArray();
        $shops = Shop::all()->toArray();
        $materials = MaterialType::where('is_deleted', 0)->lists('title', 'id')->toArray();
        $designList = Design::with('categories', 'subCategories')->get()->toArray();
        $kaligardsLists = [];
        $shopLists = [];
        $designs = [];
        foreach($designList as $key => $design) {
            $designs[$design['id']] = $design['code'] . ' - ' . $design['sub_categories']['title'];
        }
        foreach($kaligards as $key => $kaligard) {
            $kaligardsLists[$kaligard['id']] = $kaligard['code'] . ' - ' . $kaligard['first_name'] . ' ' . $kaligard['middle_name'] . ' ' . $kaligard['last_name'];
        }

        foreach($shops as $key => $shop) {
            $shopLists[$shop['id']] = $shop['shop_name'];
        }


        return view('products.create')
                ->withMainCategory($mainCategory)
                ->withSubCategory($subCategory)
                ->withKaligards($kaligardsLists)
                ->withShops($shopLists)
                ->withMaterials($materials)
                ->withDesigns($designs);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        if($input['status'] == 'Complete') {
            $input['is_ready'] = 1;
        }
        $product = $this->productRepository->create($input);

        if(!empty($input['image']) ){
            $image = $request->file('image');
            if($image->isValid()) {
                $destinationPath = public_path().'/images/products/';
                $fileName = $product->id . '.'.$image->getClientOriginalExtension();
                $filePath = '/images/products/' . $fileName;
                $this->upload($image, $destinationPath, $fileName);

                $product->image = $filePath;
                $product->update();
            }
        }

        $workAssignment = [
            'product_id' => $product->id,
            'kaligard_id' => $input['kaligards'],
            'notes' => $input['kaligard_note'],
            'deadline' => $input['deadline']
        ];
        $assignment = WorkAssignment::create($workAssignment);

        $materials = $input['materials'];
        $qty = $input['qty'];
        $extra_qty = $input['extra_qty'];
        $returned_qty = $input['returned_qty'];
        $notes = $input['note'];

        foreach($input['materials'] as $key => $material) {
            $assignmentDetails = [
                'assignment_id' => $assignment->id,
                'material_id' => $material,
                'quantity' => $qty[$key],
                'extra_quantity' => $extra_qty[$key],
                'returned_quantity' => $returned_qty[$key],
                'notes' => $notes[$key]
            ];
            WorkAssignmentDetail::create($assignmentDetails);
            $inventory = Inventory::where('material_id', $material)->first();
            $inventory->quantity = $inventory->quantity - $qty[$key];
            $inventory->update();

        }

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->with(['design', 'design.categories', 'design.subCategories'])->findWithoutFail($id);
        $mainCategory = Category::where('parent_id', 0)->whereNotIn('id',[0])->get()->toArray();
        $subCategory = Category::whereNotIn('parent_id', array_keys($mainCategory))->whereNotIn('id',[0])->get()->toArray();
        $kaligards = Kaligard::where('is_deleted', 0)->get()->toArray();
        $materials = MaterialType::where('is_deleted', 0)->lists('title', 'id')->toArray();
        $shops = Shop::all()->toArray();
        $assignments = WorkAssignment::where('product_id', $product->id)->first();
        $designList = Design::with('categories', 'subCategories')->get()->toArray();

        $assignmentDetails = [];
        $designs = [];
        foreach($designList as $key => $design) {
            $designs[$design['id']] = $design['code'] . ' - ' . $design['sub_categories']['title'];
        }
        if(count($assignments)>0){
            $assignments = $assignments->toArray();
            $assignmentDetails = WorkAssignmentDetail::where('assignment_id', $assignments['id'])->get()->toArray();
        }


        $kaligardsLists = [];
        $shopLists = [];
        foreach($kaligards as $key => $kaligard) {
            $kaligardsLists[$kaligard['id']] = $kaligard['code'] . ' - ' . $kaligard['first_name'] . ' ' . $kaligard['middle_name'] . ' ' . $kaligard['last_name'];
        }

        foreach($shops as $key => $shop) {
            $shopLists[$shop['id']] = $shop['shop_name'];
        }


        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')
            ->withMainCategory($mainCategory)
            ->withSubCategory($subCategory)
            ->withKaligards($kaligardsLists)
            ->withProduct($product)
            ->withShops($shopLists)
            ->withMaterials($materials)
            ->withAssignments($assignments)
            ->withAssignmentDetails($assignmentDetails)
            ->withDesigns($designs);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $input = $request->all();
        if($input['status'] == 'Complete') {
            $input['is_ready'] = 1;
        }
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($input, $id);

        if(!empty($input['image']) ){
            $image = $request->file('image');
            $destinationPath = public_path().'/images/products/';
            $fileName = $product->id . '.'.$image->getClientOriginalExtension();
            $filePath = '/images/products/' . $fileName;
            $this->upload($image, $destinationPath, $fileName);

            $product->image = $filePath;
            $product->update();
        }


        $materials = $input['materials'];
        $qty = $input['qty'];
        $extra_qty = $input['extra_qty'];
        $returned_qty = $input['returned_qty'];
        $notes = $input['note'];
        $assignment = WorkAssignment::where('product_id', $id)->first();

        foreach($input['materials'] as $key => $material) {
            /*$details = WorkAssignmentDetail::where(['material_id' => $material, 'assignment_id', $assignment->id])->first();
            $inventory = Inventory::where('material_id', $material)->first();
            $extraSum = 0;
            $returnedSum = 0;
            $extraQuantity = $details->extra_quantity - $extra_qty[$key];
            if($extraQuantity<0) {
                $extraQuantity = $extra_qty[$key] - $details->extra_quantity;
            }
            else{
                $extraSum = 1;
            }

            $returnedQuantity = $details->returned_quantity - $returned_qty[$key];
            if($returnedQuantity<0) {
                $returnedQuantity = $returned_qty[$key] - $details->returned_quantity;
                $returnedSum = 1;
            }
                $inventory->quantity = $inventory->quantity - $qty[$key];
            $inventory->update();*/

        }

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
