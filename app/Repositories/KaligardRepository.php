<?php

namespace App\Repositories;

use App\Models\Kaligard;
use InfyOm\Generator\Common\BaseRepository;

class KaligardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'nationality',
        'image',
        'code',
        'address',
        'id_card_type',
        'id_card_image',
        'notes'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kaligard::class;
    }
}
