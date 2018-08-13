<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Business extends Model
{

    protected $defaultDistanceForScope = 50;
    protected $guarded = [

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeCloseTo($query, $latitude, $longitude)
    {
        return $query->whereRaw("
           ST_Distance_Sphere(
                point(longitude, latitude),
                point(?, ?)
            ) * .000621371192 < 20
        ", [
            $longitude,
            $latitude,
        ]);
    }
    
    public function scopeOfType($query, $type) {
        return $query->where('type',$type);
    }

    public function milesAway($longitude,$latitude) {

        $thisLongitude = $this->longitude;
        $thisLatitude = $this->latitude;

        $object = DB::select(DB::raw('
        select ST_Distance_Sphere(
            point(:lonA, :latA),
            point(:lonB, :latB)
        ) * 0.000621371192
    '), [
        'lonA' => $thisLongitude,
        'latA' => $thisLatitude,
        'lonB' => $longitude,
        'latB' => $latitude,
    ])[0];
    
    $property = get_object_vars($object);
    return round(current($property),2);

    }
}
