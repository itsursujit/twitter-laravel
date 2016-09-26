<?php

namespace App\Repositories;

use App\Models\Measurement;
use InfyOm\Generator\Common\BaseRepository;

class MeasurementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'weight_in_grams'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Measurement::class;
    }
}
