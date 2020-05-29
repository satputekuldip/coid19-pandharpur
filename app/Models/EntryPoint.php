<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EntryPoint
 * @package App\Models
 * @version May 28, 2020, 9:07 pm UTC
 *
 * @property \App\Models\District district
 * @property \App\Models\State state
 * @property \App\Models\Tahasil tahasil
 * @property integer state_id
 * @property integer district_id
 * @property integer tahasil_id
 * @property string name
 * @property string name_marathi
 */
class EntryPoint extends Model
{
    use SoftDeletes;

    public $table = 'entrypoints';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $with = ['state','district','tahasil'];



    public $fillable = [
        'state_id',
        'district_id',
        'tahasil_id',
        'name',
        'name_marathi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state_id' => 'integer',
        'district_id' => 'integer',
        'tahasil_id' => 'integer',
        'name' => 'string',
        'name_marathi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required',
        'district_id' => 'required',
        'tahasil_id' => 'required',
        'name' => 'required',
        'name_marathi' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\State::class, 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tahasil()
    {
        return $this->belongsTo(\App\Models\Tahsil::class, 'tahasil_id');
    }
}
