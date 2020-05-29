<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Repositories\BaseRepository;

/**
 * Class PatientRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:08 pm UTC
*/

class PatientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Patient::class;
    }
}
