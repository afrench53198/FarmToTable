@extends('layouts.app')

@section('content')

<div id="profile">
    <profile-component :business = "{{ $business }}" :user = "{{ $jsonUser }}"></profile-component>
</div>
@include('common.errors')
@endsection