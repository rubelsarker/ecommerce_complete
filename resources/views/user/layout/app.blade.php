<!DOCTYPE html>
<html lang="en">
<head>
@include('user.partial._head')
</head>
<body>
<div class="super_container">
    <!-- Header -->
    @include('user.partial._header')
    @yield('content')
    @include('user.partial._footer')
</div>
@include('user.partial._script')
</body>
</html>