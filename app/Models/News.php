<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 * @package App\Models
 * @version March 7, 2020, 10:49 pm UTC
 *
 * @property string title
 * @property string body
 * @property string featured_image
 * @property string video
 * @property string link
 */
class News extends Model
{
    use SoftDeletes;

    public $table = 'news';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'body',
        'featured_image',
        'video',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'featured_image' => 'string',
        'video' => 'string',
        'link' => 'string',
        'created_at' => 'date:Y-m-d h:m:s',
        'updated_at' => 'date:Y-m-d h:m:s'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        'featured_image' => 'required'
    ];


}
