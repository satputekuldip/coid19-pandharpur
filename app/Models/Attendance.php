<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attendance
 * @package App\Models
 * @version May 28, 2020, 9:12 pm UTC
 *
 * @property \App\Models\Patient patient
 * @property integer patient_id
 * @property string|\Carbon\Carbon checked_at
 * @property string symptoms
 * @property string remarks
 * @property integer complete_quarantine_days
 */
class Attendance extends Model
{
    use SoftDeletes;

    public $table = 'attendance';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'patient_id',
        'checked_at',
        'symptoms',
        'remarks',
        'complete_quarantine_days'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
        'checked_at' => 'datetime',
        'symptoms' => 'string',
        'remarks' => 'string',
        'complete_quarantine_days' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_id' => 'required',
        'checked_at' => 'required',
        'symptoms' => 'required',
        'remarks' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id','id');
    }
}
