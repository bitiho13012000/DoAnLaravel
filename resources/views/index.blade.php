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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Danh Mục</h3>
            </div>
            <ul class="list-group">
                @foreach($category as $cat)
                <li class="list-group-item">
                    <span class="badge">{{ $cat->products->count() }}</span>
                    <a href="{{ route('view',['slug'=>$cat->slug]) }}">{{ $cat->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            @foreach ($top_product as $tp)
                <div class="col-md-3">
                    <div class="thumbnail">
                    <img src="{{ url('uploads')}}/{{$tp->image }}" alt="" style="padding:10px;">
                        <div class="caption text-center">
                            <h4 style="font-weight:500">{{ $tp->name }}</h4>
                            <p>
                                @if($tp -> sale_price > 0)
                                <s>Old Price: {{ number_format($tp->price) }}$</s> <br>
                                <b>New Price: {{ number_format($tp->sale_price) }}$</b>
                                @else
                                <b>Price:{{ number_format($tp->price) }}$</b>
                                @endif
                            </p>
                            <p>
                                <a href="{{ route('view',['slug'=>$tp->slug]) }}" class="btn-xs btn btn-primary">Detail</a>
                                <a href="#" class="btn-xs btn btn-default">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
