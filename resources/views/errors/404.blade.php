<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">title_ar</x-slot>
    @else
        <x-slot name="title">title</x-slot>
    @endif
    <x-slot name="content">
        <main class="container cent" x-data="toastNotification()">
            <div class="cent flex-col max-w-3xl gap-10 ">
                <img src="{{ asset('assets/img/notfound404.png') }}" alt="notfound404">
                <p class="w-[50%] text-xl text-center">
                    {{ __('messages.The page you are looking for may have been removed, its name has changed, or it is temporarily unavailable.') }}
                </p>
                <button class="button-sec w-[50%]"><a href="{{ get_page_permalink('home') }}">العودة إلى الصفحة
                        الرئيسية</a></button>
            </div>
        </main>
    </x-slot>
</x-layout-component>
