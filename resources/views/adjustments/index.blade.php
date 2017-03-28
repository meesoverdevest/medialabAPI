@extends('layouts.app')

@section('content')
    <div class="container">


      <h1>Wijzigingen</h1>
      <hr/>

      <div class="col-md-12">

      @foreach($adjustments as $adjustment)
      	<div class="col-md-6">
	      	<h2>{{ $adjustment->title }}</h2>
	      	<p>{{ $adjustment->description }}</p>
	      	<a class="btn btn-info" href="{{ route('admin.adjustments.show', $adjustment->id) }}">Bekijk deze wijziging</a>
    		</div>
      @endforeach

      </div>

    </div>

@stop
