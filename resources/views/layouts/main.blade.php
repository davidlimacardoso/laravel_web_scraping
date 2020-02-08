<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebScraping - @yield('title')</title>

    <!--Styles-->
    @stack('styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!--SCRIPTS-->
    @stack('script-top')

</head>
<body>
    @extends('partials/_partials')

    @section('navbar')
        @parent
    @endsection

    @section('body-content')
        @parent
    @endsection

    @section('footer')
        @parent
    @endsection

    @section('script')
    <script src="{{asset('js/app.js')}}"></script>
    <!--SCRIPT-BOTTOM-->
    @stack('script-bottom')
    <!--JQUERY BOOTSTRAP POPPERS-->
    @parent
    @endsection
</body>
</html>
