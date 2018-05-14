@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h1>Add to the list</h1>
    
    {!! Form::open(['action' => 'TodoController@store', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('to_do', 'to_do')}}
        {{Form::textarea('to_do', '', ['class'=>'form-control', 'placeholder'=>'To Do'])}}
    </div>

    

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}


{!! Form::close() !!}
</div>

@stop