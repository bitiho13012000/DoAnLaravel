@extends('master')

@section('main')

<div class="jumbotron">
    <div class="container">
        <h1>Hello, Home!</h1>
        <p>Contents ...</p>
        <p>
            <a class="btn btn-primary btn-lg" href="{{ route('product.index') }}">Let' go admin</a>
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
                    <img src="{{ url('uploads')}}/{{$tp->image }}" alt="" style="padding:10px;">
                        <div class="caption">
                            <h3 style="text-align: center;font-weight:500">{{ $tp->name }}</h3>
                            <p style="text-align: center">{{ $tp->price }} $</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
