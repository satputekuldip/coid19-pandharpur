<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Symptom
 * @package App\Models
 * @version May 28, 2020, 9:11 pm UTC
 *
 * @property string name
 * @property string name_marathi
 * @property string risk
 */
class Symptom extends Model
{
    use SoftDeletes;

    public $table = 'symptoms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'name_marathi',
        'risk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'name_marathi' => 'string',
        'risk' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'name_marathi' => 'required',
        'risk' => 'required'
    ];

    
}
