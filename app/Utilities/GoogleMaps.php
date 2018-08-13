<?php

namespace App\Utilities;

use function GuzzleHttp\json_decode;
use GuzzleHttp\Client;

class GoogleMaps 
{
   public static function geocodeAddress($address, $city, $state, $zip) {
        
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='
        .urlencode( $address.' '.$city.', '.$state.' '.$zip ).'&key='.env( 'GOOGLE_MAPS_API_KEY' );
        
        $client = new Client();

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
        } else {
            return $geocodeResponse;
        }

        return $coordinates;
    }

    /**
     * @param $coordinatesA  and $coordinatesB are objects containing lat and long props
     * @return String distance or error response
     */
    public static function distanceBetween($latA,$longA,$latB,$longB) {
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.
         $latA . ',' . $longA . '&destinations='. $latB . ',' . $longB . '&key='.env( 'GOOGLE_MAPS_API_KEY' );
       
        $client = new Client();

        $response = $client->get( $url )->getBody();

        $data = json_decode($response);

        $distance = null;

        if ($data->rows[0]->elements[0]) {
            $distance = $data->rows[0]->elements[0]->distance->text;
            return $distance;
        } else {
            // Return Error
            return $response;
        }



    }
}
