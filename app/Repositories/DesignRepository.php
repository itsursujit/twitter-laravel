<?php

namespace App\Repositories;

use App\Models\Design;
use InfyOm\Generator\Common\BaseRepository;

class DesignRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'category',
        'sub_category',
        'image',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Design::class;
    }
}
