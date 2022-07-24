<!DOCTYPE html>
<html lang="utf-8">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Josefin+Sans:wght@300&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Josefin+Sans:wght@300&family=Varela+Round&display=swap"
        rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Bundle-B</title>
</head>

<body>
    @include('frontend.partials.navbar')
    <div class="main-section">
        @yield('main_section')
    </div>
    @include('frontend.partials.footer')
</body>
</html>
