<?php
namespace Coolsam\World\Models;

use Jenssegers\Mongodb\Eloquent\Model;


/**
 * City
 */
class CityLocale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'world_cities_locale';
    protected $collection = 'world_cities_locale';

    /**
     * return belonged City
     * 
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class,'city_id', 'id');
    }
}
