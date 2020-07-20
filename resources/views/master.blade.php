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
            @if (Auth::check())
                <li><a href="{{ route('category.index') }}">Chào {{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
            @else
                <li><a href="{{ route('home.login') }}"><span class="glyphicon glyphicon-user"></span>Đăng Nhập</a></li>
                <li><a href="#"><span class="fa fa-group"></span>Đăng Ký</a></li>
            @endif
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
                <img src="{{ url('img/1.jfif') }}" alt="Los Angeles">
              </div>

              <div class="item">
                <img src="{{ url('img/2.jfif') }}" alt="Chicago">
              </div>

              <div class="item">
                <img src="{{ url('img/3.jfif') }}" alt="New York">
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
               <form action="{{ route('search') }}" method="get" class="search-form">
                   <div class="search_box">
                    <input type="text" id="query" name="query" placeholder="Search">
                   </div>
               </form>
            </div>
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

    <footer>
        <div class="container ft-pr">
            <div class="jumbotron">
                <div class="row ft-row">
                    <div class="col-md-3">
                        <h4>SOME THING ME</h4>

                        <p>Itmeo is a software and design company. Our team creates useful tools for web designers and developers. <br> <strong> Our team creates useful tools for web designers and developers.</strong> </p>
                    </div>
                    <div class="col-md-3">
                        <h4>OTHER PROJECTS</h4>
                        <p>Phoneix Starup</p>
                        <p>Avenger EndGame</p>
                        <p>Captain American</p>
                        <p>Black Widow</p>
                        <p>IronMan 1</p>
                        <p>Doctor Strange</p>
                    </div>
                    <div class="col-md-3">
                        <h4>GET IN TOUCH</h4>
                        <p>About me</p>
                        <p>Contact us</p>


                    </div>
                    <div class="col-md-3">
                        <h4>FOLLOW ME</h4>
                        <p>Facebook <i class="fa fa-facebook-square"></i></p>
                        <p>fb.com/biti.it</p>
                        <p><i class="fa fa-cloud" style="font-size:60px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i></p>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
