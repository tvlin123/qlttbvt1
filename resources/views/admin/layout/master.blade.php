<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>qlttbvt1</title>
        <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
        <meta name="author" content="Pike Web Development - https://www.pikephp.com">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url('public/admin/assetsimages/favicon.ico') }}">

        <!-- Switchery css -->
        <link href="{{ url('public/admin/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="{{ url('public/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="{{ url('public/admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="{{ url('public/admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- BEGIN CSS for this page -->

        <!-- END CSS for this page -->
        @yield('cssheader')

</head>

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->

    @include('admin.layout.header')
    <!-- End Navigation -->


    <!-- Left Sidebar -->
    @include('admin.layout.sidebar')
    <!-- End Sidebar -->





        @yield('content')



        <!-- END content -->

    </div>
    <!-- END content-page -->

   @include('admin.layout.footer')

</div>
<!-- END main -->

<script src="{{ url('public/admin/assets/js/modernizr.min.js') }}"></script>
<script src="{{ url('public/admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('public/admin/assets/js/moment.min.js') }}"></script>

<script src="{{ url('public/admin/assets/js/popper.min.js') }}"></script>
<script src="{{ url('public/admin/assets/js/bootstrap.min.js') }}"></script>

<script src="{{ url('public/admin/assets/js/detect.js') }}"></script>
<script src="{{ url('public/admin/assets/js/fastclick.js') }}"></script>
<script src="{{ url('public/admin/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ url('public/admin/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ url('public/admin/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ url('public/admin/assets/plugins/switchery/switchery.min.js') }}"></script>

<!-- App js -->
<script src="{{ url('public/admin/assets/js/pikeadmin.js') }}"></script>

<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->
  @yield('jsfooter')

</body>
</html>
