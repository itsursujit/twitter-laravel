<?php

namespace App\Repositories;

use App\Models\MaterialType;
use InfyOm\Generator\Common\BaseRepository;

class MaterialTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MaterialType::class;
    }
}
