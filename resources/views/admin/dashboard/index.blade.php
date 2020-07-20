@extends('admin/master')
@section('title',"Trang chủ quản trị")


@section('main')
<div class="container-fluid">
    <div >

     <h5 href="{{ url('admin.product') }}"> <i class="icon-dashboard"></i> <span>{{ count_item_product() }}</span> Sản Phẩm </h5>

    </div>
</div>
@stop
