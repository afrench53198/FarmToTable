<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
