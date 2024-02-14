<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? ($page->title_ar ? $page->title_ar : $page->title) }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
    @endif
    <x-slot name="content">
        @livewire('all-diploma-component')
    </x-slot>
</x-layout-component>
