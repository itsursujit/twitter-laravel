<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'title',
        'category',
        'sub_category',
        'weight',
        'additional_jarti',
        'wages',
        'image',
        'status',
        'is_ready',
        'amount',
        'notes',
        'material_description',
        'length',
        'size'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
