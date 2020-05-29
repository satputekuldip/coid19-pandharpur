<?php

namespace App\Repositories;

use App\Models\Symptom;
use App\Repositories\BaseRepository;

/**
 * Class SymptomRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:11 pm UTC
*/

class SymptomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'name_marathi',
        'risk'
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
        return Symptom::class;
    }
}
