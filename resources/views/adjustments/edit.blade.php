@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>Wijzigen van wijziging</h1>
        <hr/>


        {!! Form::model($adjustment, ['method' => 'PATCH','route' => 'adjustments.update']) !!}
        @include('adjustments._form', ['submitButtonText'=> 'Wijziging opslaan' ])
        {!! Form::close() !!}

    </div>

@stop
