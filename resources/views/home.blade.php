@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3><a href="{{action('TodoController@create')}}" class="btn btn-primary">Add new To do</a></h3>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
