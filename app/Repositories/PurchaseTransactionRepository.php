<?php

namespace App\Repositories;

use App\Models\PurchaseTransaction;
use InfyOm\Generator\Common\BaseRepository;

class PurchaseTransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'material_id',
        'purchased_date',
        'purchased_from',
        'quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PurchaseTransaction::class;
    }
}
