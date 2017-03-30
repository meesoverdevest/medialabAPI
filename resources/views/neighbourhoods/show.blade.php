@extends('layouts.app')

@section('content')
  <div class="container">


    <h1>Wijk {{ $hood->title }}</h1>
    <hr/>

    <div class="col-md-12">
    	<p>{{ $hood->description }}</p>

    </div>

  </div>

@stop
