@extends('master')
@section('main')


<div class="panel panel-default">
<div class="panle-heading">

</div>
<div class="panel-body">
</div>


<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên SP</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        <?php $n = 1 ?>
        @foreach ($cart->items as  $item)
            <tr>
                <td>{{ $n }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}$</td>
                <td>
                    <form action="{{ route('cart.update',['id'=>$item['id']]) }}" method="get">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" >
                        <input type="submit" class="btn  btn-primary" value="Lưu">
                    </form>
                </td>
                <td>
                    {{ $item['price']*$item['quantity'] }}$
                </td>
                <td>
                    <a href="{{ route('cart.remove',['id'=>$item['id']]) }}" class="btn  btn-danger">Xóa</a>
                </td>

            </tr>

            <?php $n++; ?>
        @endforeach

    </tbody>

</table>

<p>ToTal:</p>
<a href="{{ route('cart.clear') }}" class="btn btn-danger">Xóa hết</a>

</div>








@stop
<style>
    input[type="number"] {
    width: 10%;
}
</style>
