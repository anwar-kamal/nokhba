<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? $page->title_ar }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
        @if ($content_blogs->value())
            <x-slot name="content_blogs">{{ $content_blogs->value() }}</x-slot>
            <x-slot name="main_image">{{ $page->main_image }}</x-slot>
        @endif
    @endif
    <x-slot name="content">
        <x-layout-blogs-component :page=$page />
    </x-slot>
</x-layout-component>
