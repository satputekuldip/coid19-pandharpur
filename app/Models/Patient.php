<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patient
 * @package App\Models
 * @version May 28, 2020, 9:08 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection attendances
 * @property \Illuminate\Database\Eloquent\Collection quarantinePatients
 * @property string full_name
 * @property string gender
 * @property integer age
 * @property string mobile
 * @property integer state_id
 * @property string state
 * @property integer district_id
 * @property string district
 * @property integer tahasil_id
 * @property string tahasil
 * @property string pincode
 * @property string current_address
 * @property boolean permission_to_enter
 * @property boolean have_medical_certificate
 * @property integer entry_point_id
 * @property string entry_point
 * @property string health_condition
 * @property string covid_status
 * @property boolean present_at_quarantine
 */
class Patient extends Model
{
    use SoftDeletes;

    public $table = 'patients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'full_name',
        'gender',
        'age',
        'mobile',
        'state_id',
        'state',
        'district_id',
        'district',
        'tahasil_id',
        'tahasil',
        'pincode',
        'current_address',
        'permission_to_enter',
        'have_medical_certificate',
        'entry_point_id',
        'entry_point',
        'health_condition',
        'covid_status',
        'present_at_quarantine'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'gender' => 'string',
        'age' => 'integer',
        'mobile' => 'string',
        'state_id' => 'integer',
        'state' => 'string',
        'district_id' => 'integer',
        'district' => 'string',
        'tahasil_id' => 'integer',
        'tahasil' => 'string',
        'pincode' => 'string',
        'current_address' => 'string',
        'permission_to_enter' => 'boolean',
        'have_medical_certificate' => 'boolean',
        'entry_point_id' => 'integer',
        'entry_point' => 'string',
        'health_condition' => 'string',
        'covid_status' => 'string',
        'present_at_quarantine' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'mobile' => 'required',
        'state_id' => 'required',
        'district_id' => 'required',
        'tahasil_id' => 'required',
        'pincode' => 'required',
        'current_address' => 'required',
        'permission_to_enter' => 'required',
        'have_medical_certificate' => 'required',
        'entry_point_id' => 'required',
        'health_condition' => 'required',
        'covid_status' => 'required',
        'present_at_quarantine' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class, 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function quarantinePatient()
    {
        return $this->hasOne(\App\Models\QuarantinePatient::class, 'patient_id');
    }
}
