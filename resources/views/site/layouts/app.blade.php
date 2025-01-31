<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ludokai</title>
    @vite('resources/css/app.css')
</head>

<body>

    <x-header />
    {{-- <x-header :categories="$categories" /> --}}
    @yield('site_content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebar_button').on('click', function() {
                $('#sidebarMenu').toggleClass('-translate-x-full');
                $('#sidebarOverlay').toggleClass('hidden');
            });

            $('#sidebarOverlay').on('click', function() {
                $('#sidebarMenu').addClass('-translate-x-full');
                $(this).addClass('hidden');
            });
        });
    </script>

    @yield('site_scripts')
</body>

</html>