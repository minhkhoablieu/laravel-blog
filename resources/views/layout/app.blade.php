<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ Setting::get('meta_site_name') }}</title>

    <meta content='index, follow' name='robots'/>

    <meta name="description" content="{{ Setting::get('meta_description') }}">
    <meta name="keyword" content="{{ Setting::get('meta_keyword') }}">

    @yield('meta')

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    @stack('after-styles')
</head>
<body>
    <x-google-analytics />
    <x-header />
    <div class="container mx-auto px-5 lg:max-w-screen-md">
        @yield('content')
    </div>

    <x-footer></x-footer>
    <script src="https://unpkg.com/@tabler/icons@1.36.0/icons-react/dist/index.umd.js"></script>

    <script src="{{mix('js/app.js')}}"></script>

</body>
</html>
