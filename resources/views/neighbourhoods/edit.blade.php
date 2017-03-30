@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>Wijzigen van wijk</h1>
        <hr/>


        {!! Form::model($hood, ['method' => 'PATCH','route' => 'admin.neighbourhoods.update']) !!}
      		@include('neighbourhoods._form', ['submitButtonText'=> 'Wijk opslaan' ])
        {!! Form::close() !!}

    </div>

@stop
