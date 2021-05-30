<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asmat</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/main.css') }}">
</head>
<body>

    @yield('content')
    <button class="scrollToTopBtn" style="cursor: pointer"><img src="{{ asset("public/images/arrow-white copy.svg") }}" alt="" id="arrow-top"></button>

    <script type="text/javascript" src="{{ asset('public/js/layoutMain.js') }}"></script>
</body>
</html>