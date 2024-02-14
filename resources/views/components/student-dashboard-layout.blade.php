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

<body class="overflow-x-hidden relative font-somar">
    <x-header-component></x-header-component>

    {{$slot}}

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr( "#myDatePicker", {
                dateFormat: "Y-m-d",
                inline: true,
                weekNumbers: true,
                disableMobile: "true",
                monthSelectorType: "static"
            } );
        </script> --}}
</body>

</html>
