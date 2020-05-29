<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuarantinePatient
 * @package App\Models
 * @version May 28, 2020, 9:10 pm UTC
 *
 * @property \App\Models\Patient patient
 * @property \App\Models\QuarantineAddress quarantineAddress
 * @property integer patient_id
 * @property integer quarantine_address_id
 * @property string covid_status
 * @property boolean present_at_quarantine
 * @property string remark
 * @property string quarantined_at
 * @property string known_positive_at
 * @property string known_negative_at
 * @property string recovered_at
 * @property string died_at
 */
class QuarantinePatient extends Model
{
    use SoftDeletes;

    public $table = 'quarantine_patients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'patient_id',
        'quarantine_address_id',
        'covid_status',
        'present_at_quarantine',
        'remark',
        'quarantined_at',
        'known_positive_at',
        'known_negative_at',
        'recovered_at',
        'died_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
        'quarantine_address_id' => 'integer',
        'covid_status' => 'string',
        'present_at_quarantine' => 'boolean',
        'remark' => 'string',
        'quarantined_at' => 'date',
        'known_positive_at' => 'date',
        'known_negative_at' => 'date',
        'recovered_at' => 'date',
        'died_at' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_id' => 'required',
        'quarantine_address_id' => 'required',
        'covid_status' => 'required',
        'present_at_quarantine' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function quarantineAddress()
    {
        return $this->belongsTo(\App\Models\QuarantineAddress::class, 'quarantine_address_id');
    }
}
