@extends('master')

@section('main')

<div class="jumbotron">
    <div class="container">
        <h1>Hello, Home!</h1>
        <p>Contents ...</p>
        <p>
            <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
        <div class="row">
            @foreach ($top_product as $tp)
                <div class="col-md-3">
                    <div class="thumbnail">
                    <img src="{{ url('uploads')}}/{{$tp->image }}" alt="">
                        <div class="caption">
                            <h3>{{ $tp->name }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
