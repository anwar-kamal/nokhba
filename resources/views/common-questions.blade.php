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
    @endif
    <x-slot name="content">
        @php
            $questions = langContent('questions');
        @endphp
        <div class="py-16 container md:grid md:grid-cols-2 gap-12 justify-center items-center">
            <div class="grid gap-4">
                @foreach ($page->$questions as $question)
                <div x-data="{ open: false }">
                    <div class="bg-lightgray  rounded-2xl py-2" @click="open=!open ">
                        <div class=" flex justify-between items-center px-8 cursor-pointer">
                            <h5 class="diploma-sub-title">{{ $question['title_questions'] }}</h5>
                            <button class="text-center text-primary text-lg font-semibold  capitalize leading-[18px]">
                                <i class="fa-solid fa-window-minimize" x-show="open"></i>
                                <i class="fa-solid fa-plus" x-show="!open"></i>
                            </button>
                        </div>
                        <div x-show="open ||opend" x-transition:enter="transition transform ease-out duration-700"
                            x-transition:enter-start="opacity-0 translate-y-[-100px]"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition transform ease-in duration-700"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-[-100px]">
                            <div class="my-2 h-0.5 opacity-60 bg-neutral-200"></div>
                            <div class="p-4 text-zinc-600 text-base font-normal capitalize leading-7">{{ $question['content_questions'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="hidden md:block">
                <div class="overflow-hidden cent">
                    <img src="{{ asset('assets/img/faqs.png') }}" alt="" class="aspect-video w-full">
                </div>
            </div>
        </div>
    </x-slot>
</x-layout-component>
