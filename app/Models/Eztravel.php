<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Eztravel
 * @package App\Models
 * @version October 26, 2021, 5:54 am UTC
 *
 * @property string $origin
 * @property string $destination
 * @property integer $flight_no
 * @property string $departure_date
 * @property string $arrival_date
 * @property string $passenger_name
 * @property integer $age
 * @property string $travel_class
 */
class Eztravel extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'eztravel';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'origin' => 'string',
        'destination' => 'string',
        'flight_no' => 'integer',
        'departure_date' => 'date',
        'arrival_date' => 'date',
        'passenger_name' => 'string',
        'age' => 'integer',
        'travel_class' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'origin' => 'required|string|max:255',
        'destination' => 'required|string|max:255',
        'flight_no' => 'required',
        'departure_date' => 'required',
        'arrival_date' => 'required',
        'passenger_name' => 'required|string|max:255',
        'age' => 'required|integer',
        'travel_class' => 'required|string|max:30',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
