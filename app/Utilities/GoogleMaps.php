<?php

namespace App\Utilites;

use function GuzzleHttp\json_decode;


class GoogleMaps 
{
    function geocodeAddress($address, $city, $state, $zip) {
        
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode( $address.' '.$city.', '.$state.' '.$zip ).'&key='.env( 'GOOGLE_MAPS_API_KEY' );
        
        $client = new Guzzle\Http\Client();

        // send get request and decode data
        $geocodeResponse = $client->get( $url )->getBody();

        $geocodeData = json_decode($geocodeResponse);

        // initialize coordinates array
        $coordinates = [
            'lat'=>null,
            'lng'=>null,
        ];

        if( !empty( $geocodeData )
         && $geocodeData->status != 'ZERO_RESULTS' 
         && isset( $geocodeData->results ) 
         && isset( $geocodeData->results[0] ) ){
    $coordinates['lat'] = $geocodeData->results[0]->geometry->location->lat;
    $coordinates['lng'] = $geocodeData->results[0]->geometry->location->lng;
  }

  return $coordinates;
    }
}
