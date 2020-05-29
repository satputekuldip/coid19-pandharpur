<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DailyDeath
 * @package App\Models
 * @version March 9, 2020, 9:55 pm UTC
 *
 * @property string recorded_date
 * @property integer deaths
 * @property integer change_in_day
 * @property integer change_in_day_percent
 */
class DailyDeath extends Model
{
    use SoftDeletes;

    public $table = 'daily_deaths';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'recorded_date',
        'deaths',
        'change_in_day',
        'change_in_day_percent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recorded_date' => 'date',
        'deaths' => 'integer',
        'change_in_day' => 'integer',
        'change_in_day_percent' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'recorded_date' => 'required',
        'deaths' => 'required',
        'change_in_day' => 'required',
        'change_in_day_percent' => 'required'
    ];

    
}
