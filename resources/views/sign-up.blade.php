<x-layout-component>
    <x-slot name="header">false</x-slot>
    <x-slot name="footer">false</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? $page->title_ar }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
    @endif
    <x-slot name="content">
        <section class=" fixed inset-0" x-data="{ modal: false }">
            @php
                $main_image = langContent('main_image');
            @endphp
            <img src="{{ getImage($page->$main_image) }}" class="w-full h-full hidden md:block inset-0 fixed">
            @livewire('sign-up-component')
        </section>
    </x-slot>
</x-layout-component>
