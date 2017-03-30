@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>Aanmaken van nieuwe wijk</h1>
        <hr/>


        {!! Form::open(['route' => 'admin.neighbourhoods.store']) !!}

        	@include('neighbourhoods._form', ['submitButtonText'=> 'Wijk opslaan' ])
        {!! Form::close() !!}

    </div>

@stop
