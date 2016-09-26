<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PurchaseTransaction",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="purchased_date",
 *          description="purchased_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="purchased_from",
 *          description="purchased_from",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class PurchaseTransaction extends Model
{
    use SoftDeletes;

    public $table = 'purchase_transactions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'material_id',
        'purchased_date',
        'purchased_from',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'purchased_date' => 'date',
        'purchased_from' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
