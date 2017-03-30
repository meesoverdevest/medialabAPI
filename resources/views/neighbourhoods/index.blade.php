@extends('layouts.app')

@section('content')
    <div class="container">


      <h1>Wijken</h1>
      <hr/>

      <div class="col-md-12">

      @foreach($hoods as $hood)
      	<div class="col-md-6">
	      	<h2>{{ $hood->title }}</h2>
	      	<p>{{ $hood->description }}</p>
	      	<a class="btn btn-info" href="{{ route('admin.neighbourhoods.show', $hood->id) }}">Bekijk deze wijk</a>
    		</div>
      @endforeach

      </div>

    </div>

@stop
