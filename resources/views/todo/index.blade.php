@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    @if(count($todos)>0)
        @foreach($todos as $todo)
            <div class="well">    
            <h1>{{$todo->name}}</h1>
            <a href="{{action('TodoController@show', [$todo->id])}}"><h1>{{$todo->to_do}}</h1></a>
            <small>Written on: {{$todo->created_at}}</small>
            </div>
        @endforeach 
        {{$todos->links()}}
    @else
        <h2><p>No posts found</p></h2>
    @endif

</div>
@endsection