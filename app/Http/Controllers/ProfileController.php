<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Role;
use App\User;

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
        $role = Role::find($user->role_id);
        $business = User::find($user->id)->business;

        return view('profile.main',compact('role','user','business'));
    }

    public function store(User $user) 
    {
        
    }

    public function address(User $user, AddressRequest $request) 
    {
        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->save();

        return redirect('/profile');
    }

    public function create() 
    {
        $user = auth()->user();
        $role = Role::find($user->role_id);
        
        return view('profile.create',compact('role','user'));
    }
}
