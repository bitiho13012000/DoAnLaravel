<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <nav class="navbar navbar-inverse">

        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a href="{{ route('about') }}">About</a>
            </li>
            <li>
                <a href="{{ route('cate') }}">Category</a>
            </li>
        </ul>
    </nav>

    <div class="container">

       @yield('main')

    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
