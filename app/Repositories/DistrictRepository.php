<?php

namespace App\Repositories;

use App\Models\District;
use App\Repositories\BaseRepository;

/**
 * Class DistrictRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:06 pm UTC
*/

class DistrictRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state_id',
        'name',
        'name_marathi'
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
        return District::class;
    }
}
