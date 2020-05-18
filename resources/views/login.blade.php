@extends('master')

@section('main')


<form action="" method="post" class="beta-form-checkout">
    <div class="row">

        <div class="col-sm-6">
            <h4>Đăng Nhập</h4>

            <div class="form-block">
                <label for="email">Email</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-block">
                <label for="password">Password</label>
                <input type="password" id="password" required>
            </div>
            <button type="submit">Đăng Nhập</button>

        </div>
    </div>
</form>
@stop
