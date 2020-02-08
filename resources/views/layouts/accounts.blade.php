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
    @endsection

    @section('body-content')
        @parent
    @endsection

    @section('footer')
    @endsection

    @section('script')
    <!--SCRIPT-BOTTOM-->
    @stack('script-bottom')
    <!--JQUERY BOOTSTRAP POPPERS-->
    <script src="{{asset('js/app.js')}}"></script>
    @parent
    @endsection
</body>
</html>
