@extends('master')

@section('main')


<div class="row">

    @foreach ($product as $tp)
   <h1>{{ $tp->name }}</h1>

    @endforeach



</div>
@stop
