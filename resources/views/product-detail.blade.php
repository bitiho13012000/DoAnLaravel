@extends('master')



@section('main')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $model->name }}</h3>
    </div>
</div>
    <div class="row">
        <div class="col-md-5">
        <img src="{{ url('uploads')}}/{{$model->image }}">
        </div>
        <div class="col-md-7">
            <h2>{{ $model->name }}</h2>
            <div>{{ $model->content }}</div>
            <p>
                <form action="" method="POST" class="form-inline" role="form">
                    <div class="form-group">
                        <input type="number" class="form-control" name="quantity" placeholder="quantity">
                    </div>


                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </p>
        </div>
    </div>


@stop
