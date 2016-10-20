<?php

namespace App\Repositories;

use App\Models\WorkAssignment;
use InfyOm\Generator\Common\BaseRepository;

class WorkAssignmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kaligard_id',
        'product_id',
        'notes',
        'deadline'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WorkAssignment::class;
    }
}
