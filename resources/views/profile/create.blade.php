@extends('layouts.app')

@section('content')
<div class="container">
                @if ($user->hasOrganization)
                    @include('profile.create.business',['user'=>$user])
                @else
                    @include('profile.create.consumer',['user'=>$user]) 
                @endif
</div>

@endsection



