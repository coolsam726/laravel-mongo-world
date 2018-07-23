<?php

namespace Coolsam\World;

use Coolsam\World\Models\City;
use Coolsam\World\Models\Continent;
use Coolsam\World\Models\Country;
use Coolsam\World\Models\Division;

/**
 * World
 */
class World
{
    public static function Continents()
    {
        return Continent::get();
    }

    public static function Countries()
    {
        return Country::get();
    }

    public static function getContinentByCode($code)
    {
        return Continent::getByCode($code);
    }

    public static function getCountryByCode($code)
    {
        return Country::getByCode($code);
    }

    public static function getByCode($code)
    {
        $code = strtolower($code);
        if (strpos($code, '-')) {
            list($country_code, $code) = explode('-', $code);
            $country = self::getCountryByCode($country_code);
        } else {
            return self::getCountryByCode($code);
        }
        if ($country->has_division) {
            return Division::where([
                ['country_id', $country->id],
                ['code', $code ],
            ])->first();
        } else {
            return City::where([
                ['country_id', $country->id],
                ['code', $code ],
            ]);
        }
        throw new \Coolsam\World\Exceptions\InvalidCodeException("Code is invalid");
    }
}
