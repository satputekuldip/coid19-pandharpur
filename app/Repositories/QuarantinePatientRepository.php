<?php

namespace App\Repositories;

use App\Models\QuarantinePatient;
use App\Repositories\BaseRepository;

/**
 * Class QuarantinePatientRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:10 pm UTC
*/

class QuarantinePatientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return QuarantinePatient::class;
    }
}
