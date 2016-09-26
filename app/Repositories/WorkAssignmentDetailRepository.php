<?php

namespace App\Repositories;

use App\Models\WorkAssignmentDetail;
use InfyOm\Generator\Common\BaseRepository;

class WorkAssignmentDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assignment_id',
        'material_id',
        'notes',
        'quantity',
        'returned_quantity',
        'extra_quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WorkAssignmentDetail::class;
    }
}
