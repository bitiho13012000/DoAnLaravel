@extends('master')

@section('main')


<form action="" method="post" class="beta-form-checkout">
    @csrf
    <div class="row">

        @if (Session::has('flag'))
        <div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('message') }}

        </div>
        @endif

        <div class="col-sm-6">
            <h4>Đăng Nhập</h4>

            <div class="form-block">
                <label for="email">Email</label>
                <input type="text" name="email" required>
            </div>
            <div class="form-block">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Đăng Nhập</button>

        </div>
    </div>
</form>
@stop
