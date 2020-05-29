<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuarantineAddress
 * @package App\Models
 * @version May 28, 2020, 9:09 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection quarantinePatients
 * @property string type
 * @property string name
 * @property string phone
 * @property integer state_id
 * @property string state
 * @property integer district_id
 * @property string district
 * @property integer tahasil_id
 * @property string tahasil
 * @property string address
 * @property string pincode
 */
class QuarantineAddress extends Model
{
    use SoftDeletes;

    public $table = 'quarantine_addresses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'name',
        'phone',
        'state_id',
        'state',
        'district_id',
        'district',
        'tahasil_id',
        'tahasil',
        'address',
        'pincode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'phone' => 'string',
        'state_id' => 'integer',
        'state' => 'string',
        'district_id' => 'integer',
        'district' => 'string',
        'tahasil_id' => 'integer',
        'tahasil' => 'string',
        'address' => 'string',
        'pincode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'state_id' => 'required',
        'district_id' => 'required',
        'tahasil_id' => 'required',
        'address' => 'required',
        'pincode' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function quarantinePatients()
    {
        return $this->hasMany(\App\Models\QuarantinePatient::class, 'quarantine_address_id');
    }
}
