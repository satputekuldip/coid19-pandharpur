<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class District
 * @package App\Models
 * @version May 28, 2020, 9:06 pm UTC
 *
 * @property \App\Models\State state
 * @property \Illuminate\Database\Eloquent\Collection entrypoints
 * @property \Illuminate\Database\Eloquent\Collection tahasils
 * @property integer state_id
 * @property string name
 * @property string name_marathi
 */
class District extends Model
{
    use SoftDeletes;

    public $table = 'districts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $with = ['state'];



    public $fillable = [
        'state_id',
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
        'name' => 'required',
        'name_marathi' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\State::class, 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function entrypoints()
    {
        return $this->hasMany(\App\Models\Entrypoint::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tahasils()
    {
        return $this->hasMany(\App\Models\Tahsil::class, 'district_id');
    }
}
