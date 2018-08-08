@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
            <div class="card-header">{{$user->name}}'s Daily Forum</div>
            <div class="list-group">
                @foreach ($businesses as $business)
                    <li class="list-group-item">
                        {{$business->name}}
                    </li>
                @endforeach
            </div>
            </div>
    </div>
</div>
@endsection
