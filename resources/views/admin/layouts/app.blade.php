<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.partials._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.partials._navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('admin.partials._sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield('admin_content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('admin.partials._controlbar')
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    @include('admin.partials._footer')
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
@include('admin.partials._script')
</body>
</html>
