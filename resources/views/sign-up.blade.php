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
        <main class=" relative" >
            @livewire('sign-up-component')
        </main>
    </x-slot>
</x-layout-component>
