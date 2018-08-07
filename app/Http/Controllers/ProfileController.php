<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\User;
use App\Utilities\GoogleMaps;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    
    protected $user;
    
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $user = auth()->user();
        $jsonUser = json_encode(auth()->user());
        $business = json_encode(User::find($user->id)->business);

        return view('profile.main',compact('jsonUser','business'));
    }

    public function store(User $user) 
    {
        
    }

    public function address(User $user, AddressRequest $request) 
    {


        $coordinates = GoogleMaps::geocodeAddress($request->street,$request->city,$request->state,$request->zip);

        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->latitude = $coordinates['lat'];
        $user->longitude = $coordinates['lng'];
        $user->save();

        return redirect('/profile');
    }

    public function update(AddressRequest $request, $id) 
    {
        $updates = $request->all();

        $user = User::findOrFail($id);
        $user->street = $updates['street'];
        $user->city = $updates['city'];
        $user->state = $updates['state'];
        $user->zip = $updates['zip'];

        $coordinates = GoogleMaps::geocodeAddress($user->street,$user->city,$user->state,$user->zip);
            if ($coordinates['lat']) {
                $user['latitude'] = $coordinates['lat'];
                $user['longitude'] = $coordinates['lng'];
                $user->save();
                return response()->json($user,200);
            } else {                    
                return response()->json('invalid_address',406);
            }
    }

    public function create() 
    {
        $user = auth()->user();
        
        return view('profile.create',compact('user'));
    }
}
