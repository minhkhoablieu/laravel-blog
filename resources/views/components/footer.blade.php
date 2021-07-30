<footer class="border-t border-lighter mt-20">
    <div class="container mx-auto px-5 lg:max-w-screen-md">
        <div class="pt-10 pb-5 text-center">
            {{ Setting::get('footer_text') }}
        </div>
        <div class="flex flex-row space-x-4 justify-center items-center">

            @if(!is_null(Setting::get('facebook_url')))
                <a href="{{Setting::get('facebook_url')}}" target="_blank">
                    <span class="ti ti-brand-facebook text-2xl"></span>
                </a>
            @endif

                @if(!is_null(Setting::get('youtube_url')))
                    <a href="{{Setting::get('youtube_url')}}" target="_blank">
                        <span class="ti ti-brand-youtube text-2xl"></span>
                    </a>
                @endif


            @if(!is_null(Setting::get('linkedin_url')))
                <a href="{{Setting::get('linkedin_url')}}" target="_blank">
                    <span class="ti ti-brand-linkedin text-2xl"></span>
                </a>
            @endif
        </div>
    </div>
</footer>
