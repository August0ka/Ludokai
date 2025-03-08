<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ludokai</title>
    @vite('resources/css/app.css')
    @yield('site_styles')
</head>

<body>
    <x-header :categories="$categories" />
    @yield('site_content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dropdown-container').on('mouseover', function() {
                $('#dropdown-menu').removeClass('hidden').addClass('block');
            });

            $('#dropdown-container').on('mouseleave', function() {
                $('#dropdown-menu').removeClass('block').addClass('hidden');
            });

            $('#search-mobile-button').on('click', function() {
                $('#mobile-search-form').removeClass('hidden').addClass('block');
                $('#mobile-search-header').removeClass('hidden').addClass('flex');
                $('#web-header').removeClass('block').addClass('hidden');
                $('#search-overlay').removeClass('hidden');
            });

            $('#search-overlay').on('click', function() {
                $('#mobile-search-form').removeClass('block').addClass('hidden');
                $('#mobile-search-header').removeClass('flex').addClass('hidden');
                $('#web-header').removeClass('hidden').addClass('block');
                $('#search-overlay').addClass('hidden');
            });
        });
    </script>

    @yield('site_scripts')
    @stack('site_scripts')
</body>

</html>