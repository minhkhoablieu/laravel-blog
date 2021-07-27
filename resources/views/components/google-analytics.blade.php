
@if( !empty(\App\Models\Setting::get('google_analytics')) )
<!-- Global site tag (gtag.js) - Google Analytics -->
    @php
        $code = \App\Models\Setting::get('google_analytics');
    @endphp
<script async src="https://www.googletagmanager.com/gtag/js?id={{$code}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{$code}}');
</script>
@endif
