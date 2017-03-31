@extends('layouts.app')

@section('content')
  <div class="container">


    <h1>Wijziging {{ $adjustment->title }}</h1>
    <hr/>

    <div class="col-md-12">
    	<p>{{ $adjustment->description }}</p>
    	@foreach($adjustment->reactions as $reaction)

    		Reactie: {{ $reaction->description }}<br/>
    		Door gebruiker: {{ $reaction->user->name }}
    	@endforeach
    	

    </div>

  </div>

@stop
