@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$user->name}}'s Daily Forum</h1>
    <div class="row">
        <div class="col-12">
                <div class="list-group">
                        @foreach ($businesses as $business)
                    <li class="list-group-item forum-item">
                            
                           <h2> {{$business->name}}</h2>  
                           {{-- TODO: Cache distance between to minimize request and find a method to prevent slow loading --}}
                           {{-- <p> {{ App\Utilities\GoogleMaps::distanceBetween($business->latitude,$business->longitude,$user->latitude,$user->longitude)}} Away</p> --}}
                            <p>{{ $business->milesAway($user->longitude, $user->latitude)}} miles away</p>
                           <hr>
                           Street: {{$business->street}}
                           <hr>
                           Email:  {{$business->email}}
                           <hr>
                        
                        </li>
                        <hr>
                    @endforeach
                </div>
        </div>
           
    </div>
</div>
@endsection
