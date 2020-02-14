<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.partials._head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" style="background-color: #F4F6F9;">
    @guest('admin')
    @else
    <!-- Navbar -->
    @include('admin.partials._navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @if(Auth::check())
        <!-- Left Side Of Navbar -->
        @include('admin.partials._sidebar')
    @else
    @endif

    @endguest

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield('admin_content')
    </div>

    <!-- /.content-wrapper -->
    @guest('admin')
    @else

    <!-- Main Footer -->
    @include('admin.partials._footer')
    <!-- Control Sidebar -->
    @include('admin.partials._controlbar')
    <!-- /.control-sidebar -->
    @endguest
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
@include('admin.partials._script')
</body>
</html>
