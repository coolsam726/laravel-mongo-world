<?php
namespace Coolsam\World\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Country Locale
 */
class CountryLocale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'world_countries_locale';
    protected $collection = 'world_countries_locale';

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

}