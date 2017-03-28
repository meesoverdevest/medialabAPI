@extends('layouts.app')

@section('content')
  <div class="container">


    <h1>Wijziging {{ $adjustment->title }}</h1>
    <hr/>

    <div class="col-md-12">
    	<p>{{ $adjustment->description }}</p>

    </div>

  </div>

@stop
