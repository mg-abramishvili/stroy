<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Панель управления</title>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
        <link href="{{ asset('css/filepond-plugin-image-preview.css') }}" rel="stylesheet">
        <script src="{{ asset('js/filepond-plugin-image-preview.js') }}"></script>
        <script src="{{ asset('js/filepond-plugin-file-validate-type.js') }}"></script>
        <script src="{{ asset('js/filepond.js') }}"></script>
        <script src="{{ asset('js/filepond.jquery.js') }}"></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>
