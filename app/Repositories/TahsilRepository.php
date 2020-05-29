<?php

namespace App\Repositories;

use App\Models\Tahsil;
use App\Repositories\BaseRepository;

/**
 * Class TahsilRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:07 pm UTC
*/

class TahsilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state_id',
        'district_id',
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
        return Tahsil::class;
    }
}
