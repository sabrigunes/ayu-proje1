<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $table = 'cities';

    public static function getAllCities()
    {
        return City::all();
    }
    public static function getCityId($name)
    {
        $city = City::where('name',$name)->first();
        if(isset($city))
            return $city->id;
        return null;
    }

}
