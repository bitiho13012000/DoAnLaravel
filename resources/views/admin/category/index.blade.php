@extends('admin/master')
@section('title',"Quản Lí Danh Mục")

@section('main')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Category List</div>
    <div class="panel-body">

       <form action="" method="POST" role="form">

           <div class="form-group">

               <input type="text" class="form-control" id="" name="search" placeholder="Input keyword">
           </div>
           <button type="submit" class="btn btn-primary">
               Tìm kiếm
           </button>
           <a class="btn btn-success" href="{{route('cate_add')}}">Thêm</a>
       </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created at</th>
                <th></th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            @foreach($cats as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->status }}</td>
                <td>{{ $cat->created_at}}</td>
                <td><a href="{{route('cate_edit',['id'=>$cat->id])}}" class="btn btn-xs btn-primary">Edit</a></td>
                <td><a href="{{route('cate_del',['id'=>$cat->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('OK')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="clear">
    </div>
    {{ $cats -> links() }}
</div>

@stop
