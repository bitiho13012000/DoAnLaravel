
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | @yield('title')</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ url('admin/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ url('admin/css/font-awesome.css') }}" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{ url('admin/css/basic.css') }}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{ url('admin/css/custom.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Hi {{ Auth::user()->name }}</a>
            </div>

            <div class="header-right">


                <a href="{{ route('logout') }}" onclick="return confirm('Bạn có muốn thoát không?')" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i> Thoát tài khoản</a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <?php
            $menus = config('menu');
        ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    @foreach ($menus as $m)
                    <?php $class = !empty($m['items']) ? 'treeview' : '';?>
                        <li class="{{ $class }}">
                            <a class="active-menu" href="{{ Route::has($m['route']) ? route($m['route']) : '#' }}">
                                <i class="fa {{ $m['icon'] }}"></i>   {{ $m['name'] }}
                            </a>
                            @if(!empty($m['items']))
                            <ul>
                                @foreach ($m['items'] as $mc)
                                <li><a href="{{ Route::has($mc['route']) ? route($mc['route']) : '#' }}">
                                    <i class="fa {{ $mc['icon'] }}"></i>
                                    {{ $mc['name'] }}
                                </a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
                {{-- <li>
                    <a class="active-menu" href="{{ route('cate') }}"></i>Quản Lí Danh Mục</a>
                </li>

                <li>
                    <a class="active-menu" href="{{ route('user') }}">Quản Lí User</a>
                </li> --}}
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                       @yield('main')

                    </div>
                </div>
                <!-- /. ROW  -->


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ url('admin/js/jquery-1.10.2.js') }}/"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ url('admin/js/bootstrap.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{ url('admin/js/jquery.metisMenu.js') }}"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="{{ url('admin/js/custom.js') }}"></script>



</body>
</html>


