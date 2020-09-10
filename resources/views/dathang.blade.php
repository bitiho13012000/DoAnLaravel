@extends('master')
@section('main')

<div class="panel panel-default">
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th style="width:20%">Image</th>
                <th>Giá</th>
                <th style="width:20%">SL</th>
                <th style="width:13%">Thành Tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1 ?>
            @foreach ($cart->items as  $item)
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <img width="40%" src="{{ url('uploads') }}/{{ $item['image'] }}" >
                    </td>
                    <td>{{ $item['price'] }}$</td>
                    <td>
                        <form action="{{ route('cart.update',['id'=>$item['id']]) }}" method="get">
                            <input type="number"  name="quantity" min="1" max="10" value="{{ $item['quantity'] }}" >
                            <input type="submit" class="btn  btn-primary" value="Lưu">
                        </form>

                    </td>
                    <td>
                        {{ $item['price']*$item['quantity'] }}$
                    </td>
                    <td>

                    </td>

                </tr>

                <?php $n++; ?>

            @endforeach

        </tbody>
    </table>

<div class="panel-footer">
    <div class="text-right">
        <h3>Tổng tiền: {{ number_format($cart->total_price) }}$</h3>

    </div>
</div>
</div>
<h1>Đặt Hàng</h1>


<form action="{{ route('dathang') }}" method="post">
    @csrf
    <div class="form-group">
        <div class="col-sm-6">
       <label for="myEmail">Họ và Tên</label>
       <input type="text" name="name"  class="form-control" >
       @if($errors->has('name'))
       <div class="alert alert-danger">
           {{ $errors->first('name') }}
       </div>

        @endif

       <label for="myPassword">Email</label>
       <input type="email" name="email"  class="form-control" >
       @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>

                     @endif
       <label for="myEmail">Số điện thoại</label>
       <input type="number" name="phone"  class="form-control" >
       @if($errors->has('phone'))
                    <div class="alert alert-danger">
                        {{ $errors->first('phone') }}
                    </div>

                     @endif
       <label for="myEmail">Địa chỉ</label>
       <input type="text" name="address"  class="form-control">
       @if($errors->has('address'))
                    <div class="alert alert-danger">
                        {{ $errors->first('address') }}
                    </div>

                     @endif
            <br>
       <button type="submit" class="btn btn-primary">Đặt Hàng</button>
        </div>
    </div>
 </form>


@stop

<style>
    input[type="number"] {
    width: 25%;
}
</style>
