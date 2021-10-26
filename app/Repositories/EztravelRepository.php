<?php

namespace App\Repositories;

use App\Models\Eztravel;
use App\Repositories\BaseRepository;

/**
 * Class EztravelRepository
 * @package App\Repositories
 * @version October 26, 2021, 5:54 am UTC
*/

class EztravelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origin',
        'destination',
        'flight_no',
        'departure_date',
        'arrival_date',
        'passenger_name',
        'age',
        'travel_class'
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
        return Eztravel::class;
    }
}
