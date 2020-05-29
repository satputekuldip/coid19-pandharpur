<?php

namespace App\Repositories;

use App\Models\State;
use App\Repositories\BaseRepository;

/**
 * Class StateRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:05 pm UTC
*/

class StateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return State::class;
    }
}
