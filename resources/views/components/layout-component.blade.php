<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    x-data="{
        lang: localStorage.getItem('lang') || 'en',
        dir: localStorage.getItem('dir') || 'rtl',
        toggleDirLang() {
            this.lang = this.lang === 'en' ? 'ar' : 'en';
            this.dir = this.dir === 'ltr' ? 'rtl' : 'ltr';
            this.updateAttributes();
            window.location.reload();
        },
        setToLTR() {
            this.lang = 'en';
            this.dir = 'ltr';
            this.updateAttributes();
            window.location.reload();
        },
        setToRTL() {
            this.lang = 'ar';
            this.dir = 'rtl';
            this.updateAttributes();
            window.location.reload();
        },
        updateAttributes() {
            localStorage.setItem('dir', this.dir);
            localStorage.setItem('lang', this.lang);
            document.documentElement.dir = this.dir;
            document.documentElement.lang = this.lang;
        }
    }">
@if (App::getLocale() == 'ar')
    <x-head-component :title=$title_ar></x-head-component>
@else
    <x-head-component :title=$title></x-head-component>
@endif

<body class="overflow-x-hidden relative font-somar" x-data="{ toggelMenu:false , cart:false }" >
    @if (isset($header) && $header == 'true')
        <x-header-component></x-header-component>
    @endif
    @if (isset($bread_crumb))
        <main class="min-h-[283px]">
            <div class="flex justify-center items-start pt-14 relative">
                <div class="h-[283px] bg-[#2B6DF5] absolute top-0 w-full">
                    <div class="absolute inset-0">
                        <img src="{{ getImage('assets/img/form-vector.png') }}" alt="form-vector"
                            class="w-full h-full z-50">
                    </div>
                </div>
                <div>
                    <div class="flex-col justify-start items-center gap-8 inline-flex relative">
                        <div class="opacity-90 flex-col justify-start items-center gap-2.5 flex">
                            <div class="text-center text-white text-2xl font-semibold capitalize leading-normal">
                                @if (App::getLocale() == 'ar')
                                    {{ $title_ar }}
                                @else
                                    {{ $title }}
                                @endif
                            </div>
                        </div>
                        <div class="opacity-90 text-center">
                            <a href="/" class="text-white text-lg font-semibold capitalize leading-[18px]">
                                {{ __('messages.Homepage') }}
                            </a>
                            <span class="text-white text-lg font-normal capitalize leading-[18px]"></span>
                            <span class="text-neutral-200 text-lg font-normal capitalize leading-[18px]">>>
                                @if (App::getLocale() == 'ar')
                                    {{ $title_ar }}
                                @else
                                    {{ $title }}
                                @endif
                            </span>
                        </div>
                        @if (isset($image_bread_crumb) || isset($image_bread_crumb_mob))
                            <div class="container">
                                @if (isset($image_bread_crumb))
                                    <img class="hidden md:block max-h-[600px] lg:w-full aspect-[3/2] rounded-2xl"
                                        src="{{ getImage($image_bread_crumb) }}" />
                                @endif
                                @if (isset($image_bread_crumb_mob))
                                    <img class="block md:hidden max-h-[600px] rounded-2xl"
                                        src="{{ getImage($image_bread_crumb_mob) }}" />
                                @endif
                            </div>
                        @endif
                        @if (isset($content_blogs))
                            <div class="container grid lg:grid-cols-3 gap-6">
                                <img class="md:col-span-2 w-full rounded-2xl" src="{{ getImage($main_image) }}" />
                                <div x-data="{ isFixed: false }" x-init="window.addEventListener('scroll', () => { isFixed = window.scrollY > 10 })" :class="{ 'fixed': isFixed }"
                                    class="bg-white rounded-[32px] fixed left-5 border border-neutral-200 p-5">
                                    <div class=" text-neutral-800 text-[22px] font-semibold  capitalize ">
                                        {{ __('messages.Proposed diplomas') }}</div>
                                    <div class="grid gap-4 py-4">
                                        @php
                                            $entry = Statamic\Entries\Entry::query();
                                            $entry->where('collection', 'Diplomas');
                                            $entry->limit(3);
                                            $diplomas = $entry->get();
                                        @endphp
                                        @foreach ($diplomas as $diploma)
                                            <a href="{{ URL::to($diploma['slug']) }}">
                                                <div class="grid grid-cols-3 gap-2">
                                                    <div>
                                                        <img src="{{ getImage($diploma->card_image) }}"
                                                            class="w-full h-full rounded-2xl">
                                                    </div>
                                                    @php
                                                        $title = langContent('title');
                                                        $card_content = langContent('card_content');
                                                    @endphp
                                                    <div class="col-span-2 grid gap-2">
                                                        <div
                                                            class="text-neutral-800 text-base font-semibold  capitalize leading-none">
                                                            {{ $diploma->$title }}
                                                        </div>
                                                        <div
                                                            class="text-zinc-600 text-xs mt-5 font-normal leading-tight line-clamp-2">
                                                            {{ $diploma->$card_content }}</div>
                                                        <a href="{{ URL::to($diploma['slug']) }}"
                                                            class="text-red-800 text-sm font-semibold capitalize leading-[14px]">
                                                            {{ __('messages.Show more') }}</a>
                                                    </div>
                                                </div>
                                            </a>
                                            @if (!$loop->last)
                                                <div class="h-0.5 opacity-60 bg-neutral-200"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="button-sec">{{ __('messages.Inquire now') }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    @endif
    {!! \App\Models\ShortCode::compile($content ?? '') !!}
    @if (isset($footer) && $footer == 'true')
        <x-footer-component></x-footer-component>
    @endif
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/flowbit.js') }}"></script>
    
    <script>
        AOS.init({
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120, // offset (in px) from the original trigger point
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 400, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>
    {{ $customPageScript ?? '' }}
</body>

</html>
