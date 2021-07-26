@php
if(!isset($meta_page_type)){
    $meta_page_type = 'website';
}
@endphp
@switch($meta_page_type)
    @case('website')
        <meta property="og:type" content="website" />
        @break
@endswitch

<meta property="og:url" content="{{url()->full()}}" />
