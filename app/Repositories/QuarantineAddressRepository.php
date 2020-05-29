<?php

namespace App\Repositories;

use App\Models\QuarantineAddress;
use App\Repositories\BaseRepository;

/**
 * Class QuarantineAddressRepository
 * @package App\Repositories
 * @version May 28, 2020, 9:09 pm UTC
*/

class QuarantineAddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'name',
        'phone',
        'state_id',
        'state',
        'district_id',
        'district',
        'tahasil_id',
        'tahasil',
        'address',
        'pincode'
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
        return QuarantineAddress::class;
    }
}
