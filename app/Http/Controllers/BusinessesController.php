<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBusinessRequest;
use App\Business;
use App\Utilities\GoogleMaps;


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
    public function update(Request $request, $id)
    {
        //
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
