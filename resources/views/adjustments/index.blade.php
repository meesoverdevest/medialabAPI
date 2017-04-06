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

          @if(file_exists(public_path('qrcodes/' .$adjustment->id .'.png')))
            <img src="{{ asset('qrcodes/' .$adjustment->id .'.png') }}"></img>
          @endif

	      	<a class="btn btn-info" href="{{ route('admin.adjustments.show', $adjustment->id) }}">Bekijk deze wijziging</a>
          <a class="btn btn-info" href="{{ route('admin.adjustments.updateMarker', $adjustment->id) }}">Locatie wijzigen</a>
    		</div>
      @endforeach

      </div>

      {{ $adjustments->links() }}

    </div>

@stop
