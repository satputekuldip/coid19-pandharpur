<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 * @package App\Models
 * @version May 28, 2020, 9:05 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection districts
 * @property \Illuminate\Database\Eloquent\Collection entrypoints
 * @property \Illuminate\Database\Eloquent\Collection tahasils
 * @property string name
 * @property string name_marathi
 */
class State extends Model
{
    use SoftDeletes;

    public $table = 'states';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
        'name' => 'string',
        'name_marathi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'name_marathi' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function districts()
    {
        return $this->hasMany(\App\Models\District::class, 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function entrypoints()
    {
        return $this->hasMany(\App\Models\Entrypoint::class, 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tahasils()
    {
        return $this->hasMany(\App\Models\Tahasil::class, 'state_id');
    }
}
