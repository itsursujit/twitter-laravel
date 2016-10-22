<?php

namespace App\Repositories;

use App\Models\Shop;
use InfyOm\Generator\Common\BaseRepository;

class ShopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'shop_name',
        'code',
        'phone',
        'address',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Shop::class;
    }
}
