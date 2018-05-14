@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h1>Edit this to do</h1>
    
    {!! Form::open(['action' => ['TodoController@update', $todo->id], 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('to_do', 'to_do')}}
        {{Form::textarea('to_do', $todo->to_do, ['class'=>'form-control', 'placeholder'=>'To Do'])}}
    </div>

    
    {{Form::hidden('_method','PUT')}}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}


{!! Form::close() !!}
</div>

@stop