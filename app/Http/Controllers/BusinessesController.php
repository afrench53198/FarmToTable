<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBusinessRequest;
use App\Http\Requests\BusinessUpdateRequest;
use App\Business;
use App\Utilities\GoogleMaps;
use Illuminate\Auth\Access\Response;


class BusinessesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBusinessRequest $request)
    {
        $user = auth()->user();
        
        $coordinates = GoogleMaps::geocodeAddress($request->street,$request->city,$request->state,$request->zip);


        $business = Business::create([
            'user_id'=>$user->id,
            'name'=>$request->name,
            'description'=>$request->description,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'street'=>$request->street,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'latitude'=>$coordinates['lat'],
            'longitude'=>$coordinates['lng']
        ]);
    


        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessUpdateRequest $request, $id)
    {
        // Todo: Get validation working properly so the view can display error messages
        Validator::make($request->all(), [
            'name'=> 'required|string|max:255',
            'description'=> 'required|string',
            'phone' => 'required|phone|numeric',
            'email' => 'email',
            'street'=> 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|max:2',
            'zip' => 'required|max:5|string', 
        ])->validate();
        $business = Business::find($id);

        foreach ($request->updates as $key => $updatedValue) {
            $business[$key] = $updatedValue;
        }
       
        $coordinates = GoogleMaps::geocodeAddress($business->street,$business->city,$business->state,$business->zip);
            if ($coordinates['lat']) {
                $business['latitude'] = $coordinates['lat'];
                $business['longitude'] = $coordinates['lng'];
                $business->save();
                return response()->json($business,200);
            } else {                    
                return response()->json('invalid_address',406);
            }
            $business->save();
            return response()->json($business,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
