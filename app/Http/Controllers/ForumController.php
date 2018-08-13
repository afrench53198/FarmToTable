<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class ForumController extends Controller
{
    public function index() {
        $user = auth()->user();

        if ($user->hasOrganization) {
            $businesses = $this->resultsForBusinessType();

            return view('forum.home',compact('businesses','user'));
        } else {
            $businesses = $this->resultsForUser();

            return view('forum.home',compact('businesses','user'));
            
        }
        
    }

    /**
     * @param String $type the type of business the user owns
     * @return view with relevant data
     */

    protected function resultsForBusinessType() {
        $user = auth()->user();
        $userCoordinates = [
            'lat'=>$user->business()->first()->latitude,
            'long'=>$user->business()->first()->longitude
        ];
      
        $businesses = Business::closeTo($userCoordinates['lat'],$userCoordinates['long'])->get();
        

        return $businesses;

    }

    function resultsForUser() {
        $user = auth()->user();
        $userCoordinates = [
            'lat'=>$user->latitude,
            'long'=>$user->longitude
        ];

        $businesses = Business::closeTo($userCoordinates['lat'],$userCoordinates['long'])->get();

      
        return $businesses;

    }
}
