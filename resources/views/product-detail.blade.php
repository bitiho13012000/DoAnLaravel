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
            <div>{{ $model->content }}</div>
        </div>
    </div>




@stop
