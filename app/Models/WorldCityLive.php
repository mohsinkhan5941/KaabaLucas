<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorldCityLive extends Model
{
    protected $table = 'worldcities_live';
    protected $primaryKey = 'location_id';
    public $timestamps = false;

    protected $fillable = [
        'location_id',
        'city',
        'city_ascii',
        'city_alt',
        'country',
        'country_alt',
        'iso2',
        'iso3',
        'full_admin_name',
        'type',
        'admin_name',
        'admin_name_ascii',
        'admin_code',
        'admin_type',
        'capital',
        'density',
        'population',
        'population_proper',
        'ranking',
        'timezone',
        'same_name',
        'id',
        'chatgpt',
        'is_popular',
        'is_added',
        'is_updated',
        'done',
        'status',
        'bannerimage',
        'thumbimage',
        'currency',
        'timezone_acronym',
        'timezone_moreinfo',
        'official_language',
        'link1',
        'link2',
        'link3',
        'link4',
        'airport_iata',
        'airport_iata_fullname',
        'airport_distance',
        'airport_relevance',
        'airport_flights_score',
        'airport_travelers_score',
        'region',
        'latitude',
        'longitude',
        'lat',
        'lng',
        'continent',
    ];

    /**
     * Get the interest locations for this city
     */
    public function interestLocations()
    {
        return $this->hasMany(\Modules\Interest\Models\InterestLocation::class, 'locationid', 'location_id');
    }
}

