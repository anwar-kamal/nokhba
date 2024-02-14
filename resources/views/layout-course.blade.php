<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? ($page->title_ar ? $page->title_ar : $page->title) }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        @php
            $image_bread_crumb = langContent('image_bread_crumb');
        @endphp
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
        @if ($page->$image_bread_crumb)
            <x-slot name="image_bread_crumb">{{ $page->$image_bread_crumb }}</x-slot>
            @if ($page->image_bread_crumb_mob)
                <x-slot name="image_bread_crumb_mob">{{ $page->image_bread_crumb_mob }}</x-slot>
            @endif
        @endif
    @endif
    <x-slot name="content">
        <x-layout-course-component :page=$page />
    </x-slot>
</x-layout-component>
