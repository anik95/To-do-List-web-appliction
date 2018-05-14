@extends('layouts.app')

@section('content')
    
    <a href="{{action('TodoController@index')}}" class="btn btn-default">Go Back</a>
    
    <div class="well">
        
        <h4>{{$todo->name}}</h4>
        <h3>{{$todo->to_do}}</h3>
        <small>Created at: {{$todo->created_at}}</small>
        <hr>
            <a href="{{action('TodoController@edit', [$todo->id])}}" class="btn btn-default">Edit</a>
            {!!Form::open(['action'=>['TodoController@destroy', $todo->id], 'method' =>'POST', 'class'=>'btn btn-primary'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Todo Completed',['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
        
        </hr>
        
            
    </div>
@stop