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
                        <a href="{{ route('cart.remove',['id'=>$item['id']]) }}" class="btn  btn-danger"><i class="fa fa-trash"></i></a>
                    </td>

                </tr>

                <?php $n++; ?>

            @endforeach

        </tbody>
    </table>

<div class="panel-footer">
    <div class="text-right">
        <h3>Tổng tiền: {{ number_format($cart->total_price) }}$</h3>
        <a href="{{ route('cart.clear') }}" class="btn btn-danger">Xóa hết <i class="fa fa-trash"></i></a>
        <a href="{{ route('dathang') }}" class="btn btn-success">Đặt hàng</a>
    </div>
</div>
</div>
@stop

<style>
    input[type="number"] {
    width: 25%;
}
</style>
