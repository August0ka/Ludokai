<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            $('#hamburger_button').on('click', function() {
                if ($('#mobile_menu').hasClass('hidden')) {
                    $('#mobile_menu').removeClass('hidden');
                } else {
                    $('#mobile_menu').addClass('hidden');
                }
            });
        });
    </script>

    @yield('site_scripts')
</body>

</html>
