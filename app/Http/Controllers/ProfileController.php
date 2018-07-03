<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $role = Role::find($user->role_id);
        
        return view('profile.main',compact('role','user'));
    }

}
