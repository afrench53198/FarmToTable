@extends('layouts.app')

@section('content')
<div id="profile">
    <h1>Welcome to your profile, {{$user->name}}!</h1>
    <h2>Message: @{{ message }}</h2>
    @if (! empty($business))
    <div class="card">
        <h4 class="card-header">Business Information</h4>
        <div class="card-body">
            <p><strong>Name: </strong>{{$business->name}}</p>
            <p><strong>Description: </strong>{{$business->description}}</p>
        </div>
    </div>
    <div class="card">
        <h4 class="card-header">Address Information</h4>
        <div class="card-body">
            <p><strong>Street: </strong>{{$business->street}}</p>
            <p><strong>City: </strong>{{$business->city}}</p>
            <p><strong>State: </strong>{{$business->state}}</p>
            <p><strong>Zip: </strong>{{$business->zip}}</p>
        </div>
    </div>
    <div class="card">
        <h4 class="card-header">Contact Information</h4>
        <div class="card-body">
            <p><strong>Phone: </strong>{{$business->phone}}</p>
            <p><strong>Email: </strong>{{$business->email}}</p>
        </div>
    </div>
    @else
    <div class="card">
        <h4 class="card-header">Address Information</h4>
        <div class="card-body">
            <p><strong>Street: </strong>{{$user->street}}</p>
            <p><strong>City: </strong>{{$user->city}}</p>
            <p><strong>State: </strong>{{$user->state}}</p>
            <p><strong>Zip: </strong>{{$user->zip}}</p>
        </div>
    </div>
</div>
    @endif
@endsection