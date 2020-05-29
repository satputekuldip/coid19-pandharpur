<?php

namespace App\Repositories;

use App\Models\DailyDeath;
use App\Repositories\BaseRepository;

/**
 * Class DailyDeathRepository
 * @package App\Repositories
 * @version March 9, 2020, 9:55 pm UTC
*/

class DailyDeathRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'recorded_date',
        'deaths',
        'change_in_day',
        'change_in_day_percent'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DailyDeath::class;
    }
}
