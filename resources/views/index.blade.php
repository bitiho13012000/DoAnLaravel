@extends('master')

@section('main')


<div class="row">

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
                                <a href="{{ route('cart.add',['id'=>$tp->id]) }}" class="btn-xs btn btn-default">Add to cart</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
