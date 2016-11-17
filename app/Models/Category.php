<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Category",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
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
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'parent_id',
        'image',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'code' => 'required|unique:categories'
    ];

    public function parentCategory(){
        return $this->hasOne('App\Models\Category', 'id', 'parent_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'category', 'id');
    }

    public function designCategory(){
        return $this->hasMany('App\Models\Design', 'categories', 'id');
    }

    public function designSubCategory(){
        return $this->hasMany('App\Models\Design', 'sub_categories', 'id');
    }
}
