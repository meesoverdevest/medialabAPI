@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>Aanmaken van nieuwe wijziging</h1>
        <hr/>


        {!! Form::open(['route' => 'adjustments.store']) !!}
	        <div class="form-group">
					    {!! Form::label('title', 'Titel') !!}
					    {!! Form::text('title', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
					    {!! Form::label('description', 'Beschrijving') !!}
					    {!! Form::text('description', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
					    {!! Form::label('neighbourhood', 'Wijk') !!}
					    {!! Form::select('neighbourhood', $hoods, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
					    {!! Form::submit('Wijziging opslaan', ['class' => 'btn btn-primary form-control']) !!}
					</div>
        {!! Form::close() !!}

    </div>

@stop
