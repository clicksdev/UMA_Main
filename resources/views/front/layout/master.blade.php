<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth">
@include('front.layout.head')
<body class="{{App::getLocale()}}">
@include('front.layout.header')
@yield('content')
@include('front.layout.footer')
@yield('script')
</body>
</html>
