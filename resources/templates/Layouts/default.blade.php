<!DOCTYPE html>
<html>
<head>
    @include('Common.header')
</head>
<body>
@include('Common.menu')
<div class="page-container">
    @yield('content')
</div>
@include('Common.footer')
</body>
</html>
