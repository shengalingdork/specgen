<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/journal/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-5C8TGNupopdjruopVTTrVJacBbWqxHK9eis5DB+DYE6RfqIJapdLBRUdaZBTq7mE" crossorigin="anonymous">
    <link href="{{ asset('font/css/open-iconic-bootstrap.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'SpecGen') }}</title>
</head>
<body>
    <div id="app">
        @include('layouts.elements.header')
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-8 offset-md-2">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.elements.footer')
    </div>
    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script> var clipboard = new ClipboardJS('.btn')</script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/compiler.js') }}"></script>
    <script src="{{ asset('js/instruction.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</body>
</html>
