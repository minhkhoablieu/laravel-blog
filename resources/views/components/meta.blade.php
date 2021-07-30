@props([
    'metaPageType',
    'metaImage',
    'metaDescription'
])

@php
if(!isset($metaPageType)){
    $metaPageType = 'website';
}
@endphp
@switch($metaPageType)
    @case('website')
        <meta property="og:type" content="website" />
        @break
    @case('article')
        <meta property="og:type" content="article" />
        @break
@endswitch

<!-- Facebook Meta -->
<meta property="og:site_name" content="{{ Setting::get('meta_site_name') }}" />

<meta property="og:url" content="{{url()->full()}}" />
<meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
<meta property="og:description" content="{{ $metaDescription }}" />
<meta property="og:image" content="{{ asset($metaImage) }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
