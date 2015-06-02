<!DOCTYPE html>
<html>
<head>
    @include('common.header')
</head>
<body>
@include('common.menu')
<div class="page-container">
    @yield('content')
</div>
@include('common.footer')
</body>
</html>
