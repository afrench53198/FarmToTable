@extends('layouts.app')

@section('content')
<div class="container">
                @if ($role->name === 'Consumer')
                    @include('profile.create.consumer',['user'=>$user]) 
                @else
                    @include('profile.create.business',['user'=>$user])
                @endif
</div>
<script type="application/javascript" src="{{asset('js/geocoding.js')}}">

</script>
@endsection



