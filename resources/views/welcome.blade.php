<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>::--Inventory--::</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/favicon.png">
    {{-- app css --}}
    <link href="{{ asset('css/app.css') }}">
    <link href="{{ asset('backend') }}/css/all.min.css">
    {{-- app css --}}
    <link href="{{ asset('backend') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/chartist/css/chartist.min.css">
    <link href="{{ asset('backend') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/custom.css" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <style media="screen">
        .container.h-100.authincation__container {
            margin-left: 0;
        }
    </style>
</head>

<body>
    {{-- Main wrapper start --}}
    <div id="app">
      <div id="main-wrapper">
        {{-- Nav header start --}}
        <div class="nav-header" id="nav__header__part" style="display:none" v-show="$route.path === '/' || $route.path === '/register' ? false : true ">
            @include('layouts.include.nav-header')
        </div>
        {{-- Nav header end --}}

        {{-- Chat box start --}}
        <div class="chatbox" id="chatbox__part" style="display:none" v-show="$route.path === '/' || $route.path === '/register' ? false : true ">
            @include('layouts.include.chatbox')
        </div>
        {{-- Chat box End --}}

        {{-- Header start --}}
        <div class="header" id="header__part" style="display:none" v-show="$route.path === '/' || $route.path === '/register' ? false : true ">
            @include('layouts.include.header')
        </div>
        {{-- Header end ti-comment-alt --}}

        {{-- Sidebar start --}}
        <div class="deznav" id="deznav__part" style="display:none" v-show="$route.path === '/' || $route.path === '/register' ? false : true ">
            @include('layouts.include.sidebar')
        </div>
        {{-- Sidebar end --}}

        <div class="content-body content__body__remove__margin" id="content__body__part">
            <div class="container-fluid">
                <router-view></router-view>
            </div>
        </div>
        {{-- Footer start --}}
        <div class="footer" id="footer__part" v-show="$route.path === '/' || $route.path === '/register' ? false : true ">
            @include('layouts.include.footer')
        </div>
        {{-- Footer end --}}
    </div>
    </div>
    {{-- Main wrapper end --}}

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Required vendors -->
    <script src="{{ asset('backend') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom.min.js"></script>
    <script src="{{ asset('backend') }}/js/deznav-init.js"></script>
    <!-- Counter Up -->
    <script src="{{ asset('backend') }}/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('backend') }}/vendor/apexchart/apexchart.js"></script>
    <!-- Chart piety plugin files -->
    <script src="{{ asset('backend') }}/vendor/peity/jquery.peity.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="{{ asset('backend') }}/vendor/dashboard/dashboard-1.js"></script>
    {{-- mastering js --}}
    <script type="text/javascript">
      let token = localStorage.getItem('token');
      if(token){
        $("#nav__header__part").css("display","");
        $("#chatbox__part").css("display","");
        $("#header__part").css("display","");
        $("#deznav__part").css("display","");
        $("#footer__part").css("display","");

        // $("#content__body__part").removeClass('content__body__remove__margin');
      }else{
        // $("#content__body__part").addClass('content__body__remove__margin');
      }
    </script>

</body>
</html>
