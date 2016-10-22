<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Kaligard;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaligards = Kaligard::with('products')->get()->toArray();
        $category = Category::with('products', 'parentCategory')->whereNotIn('id', [0])->get()->toArray();

        foreach($category as $i => $v) {
            $notStartedCount = 0;
            $progressCount = 0;
            $completeCount = 0;
            foreach($v['products'] as $key => $product) {
                if($product['status'] == 'Not Started') {
                    $notStartedCount = $notStartedCount + 1;
                }
                elseif($product['status'] == 'In Progress'){
                    $progressCount = $progressCount + 1;
                }
                elseif($product['status'] == 'Complete'){
                    $completeCount = $completeCount + 1;
                }
            }
            $v['products']['not_started'] = $notStartedCount;
            $v['products']['in_progress'] = $progressCount;
            $v['products']['completed'] = $completeCount;
            $category[$i] = $v;
        }

        foreach($kaligards as $i => $v) {
            $notStartedCount = 0;
            $progressCount = 0;
            $completeCount = 0;
            foreach($v['products'] as $key => $product) {
                if($product['status'] == 'Not Started') {
                    $notStartedCount = $notStartedCount + 1;
                }
                elseif($product['status'] == 'In Progress'){
                    $progressCount = $progressCount + 1;
                }
                elseif($product['status'] == 'Complete'){
                    $completeCount = $completeCount + 1;
                }
            }
            $v['products']['not_started'] = $notStartedCount;
            $v['products']['in_progress'] = $progressCount;
            $v['products']['completed'] = $completeCount;
            $kaligards[$i] = $v;
        }
        return view('home')
                ->withCategories($category)
                ->withKaligards($kaligards);
    }
}
