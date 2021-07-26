<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='index, follow' name='robots'/>
    <meta name="description" content="đây là website của thằng coder cực kì lười, viết sai chính tả rất nhiều.">
    <meta name="keyword" content="">
    <x-meta></x-meta>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <x-header></x-header>
    <div class="container mx-auto px-5 lg:max-w-screen-md">
        @yield('content')
    </div>

    <x-footer></x-footer>

</body>
</html>
