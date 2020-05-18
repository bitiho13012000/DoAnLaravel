<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('css/mystyle.css') }}">
</head>

<body>


    <nav class="navbar navbar-inverse">
        <div class="container">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('cart.view') }}"><i class="fa fa-shopping-cart"></i> <span class="cart">{{ $cart->total_quantity }}</span></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('home.login') }}"><span class="glyphicon glyphicon-user"></span>Đăng Nhập</a></li>
            <li><a href="#"><span class="fa fa-group"></span>Đăng Ký</a></li>

          </ul>
        </div>
      </nav>

     <div class="container slide">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="{{ url('img/slideshow1.jpg') }}" alt="Los Angeles">
              </div>

              <div class="item">
                <img src="{{ url('img/slideshow2.jpg') }}" alt="Chicago">
              </div>

              <div class="item">
                <img src="{{ url('img/slideshow3.jpg') }}" alt="New York">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
     </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Danh Mục</h3>
                    </div>
                    <ul class="list-group">
                        @foreach($category as $cat)
                        <li class="list-group-item">
                            <span class="badge">{{ $cat->products->count() }}</span>
                            <a href="{{ route('view',['slug'=>$cat->slug]) }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
               @yield('main')
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
