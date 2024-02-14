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
            $first_section_about_us = langContent('first_section_about_us');
        @endphp
        <section class="container">
            <div class="container grid md:grid-cols-2 gap-6 max-h-[450px] inset-0 mt-12">
                <div class="relative hidden md:flex justify-center items-center">
                    <div class="h-full overflow-hidden">
                        @if ($page->$first_section_about_us[0] && $page->$first_section_about_us[0]->main_image)
                            <img src="{{ getImage($page->$first_section_about_us[0]->main_image->path) }}"
                                class="max-h-[330px]">
                        @endif
                    </div>
                </div>
                <div class="flex-col justify-start gap-4 inline-flex">
                    <div class="relative px-0.5 text-center md:text-start">
                        <h2
                            class="section-title section-title-about md:gap-4 before:bg-left ltr:before:bg-right relative">
                            {{ $page->$first_section_about_us[0]->title }}
                        </h2>
                        <p class="sub-title text-zinc-600">
                            <span>{{ $page->$first_section_about_us[0]->content }}</span>
                        </p>
                    </div>
                    <div class="grid md:grid-cols-2 lg:gap-x-20 gap-x-0 gap-y-6 lg:justify-between">
                        @foreach ($page->$first_section_about_us[0]->list as $key => $list)
                            @php
                                $img = ['task_alt_blue.png', 'task_alt_yellow.png', 'task_alt_orange.png', 'task_alt_green.png'];
                            @endphp
                            <div class="flex items-center gap-2 md:justify-start justify-center">
                                @if (array_key_exists($key, $img))
                                    <img src="{{ asset("assets/img/$img[$key]") }}" alt="{{ $img[$key] }}">
                                @else
                                    <img src="{{ asset('assets/img/task_alt_blue.png') }}" alt="task_alt_blue">
                                @endif
                                <p class="text-zinc-600 text-sm  leading-[14px]">{{ $list }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @php
            $woman_section = langContent('woman_section');
        @endphp
        <section class=" bg-section">
            <div class="container">
                <div class="grid md:grid-cols-2 justify-start gap-5">
                    <div class="flex items-center z-50">
                        <div class="flex-col justify-start gap-4 inline-flex">
                            <h2 class="section-title text-neutral-800 before:bg-right ltr:before:bg-left">
                                {{ $page->$woman_section[0]->title }}</h2>
                            <div class="sub-title text-zinc-600">
                                <span>{{ $page->$woman_section[0]->content }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative md:flex justify-center items-center max-md:hidden">
                        <div class="image-bg bg-no-repeat bg-contain bg-bottom overflow-hidden">
                            <div
                                class="absolute xl:left-[70px] xl:top-[60px] lg:left-[30px] left-[20px] lg:top-[40px] top-[20px] transform rotate-[270deg]">
                                <img src="{{ asset('assets/img/yellow-vector.png ') }}" alt="">
                            </div>
                            @if ($page->$woman_section[0] && $page->$woman_section[0]->main_image)
                                <img src="{{ getImage($page->$woman_section[0]->main_image->path) }}"
                                    class="max-h-[400px] h-full aspect-square rounded-b-full mr-2 pt-10 transform ltr:scale-x-[-1]">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
            $what_we_offer_you = langContent('what_we_offer_you');
        @endphp
        <section class="container">
            <div class="">
                <div class="cent flex-col">
                    <div class="text-center text-black md:text-[28px] text-lg font-bold capitalize leading-7">
                        {{ $page->$what_we_offer_you[0]->title }}</div>
                    <div class="sub-title mt-5 text-center">{{ $page->$what_we_offer_you[0]->main_content }}</div>
                </div>
                <div class="grid md:grid-cols-3 gap-6 mt-6">
                    @foreach ($page->$what_we_offer_you[0]->main_information as $main_information)
                        <div class="cent flex-col text-center gap-y-3">
                            <img src="{{ $main_information->icon }}">
                            <p class="font-semibold">{{ $main_information->title_infomation }}</p>
                            <p class="text-zinc-600">{{ $main_information->content_infomation }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="we_got_the_best_results"
            class="relative parallax-container-about md:h-[450px] h-[750px] overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="container cent flex-col absolute text-center text-white inset-0 py-8">
                <div class="flex-col justify-center items-center gap-6 inline-flex">
                    <div class="text-center text-white md:text-[28px] text-lg font-bold capitalize leading-7">
                        لقد حصلنا على أفضل النتائج</div>
                    <p
                        class="max-w-[991px] text-center text-neutral-200 md:text-lg text-sm  capitalize md:leading-10 leading-6 line-clamp-4 ">
                        <span>
                            لوريم إيبسوم هو ببساطة نص
                            شكلي (بمعنى
                            أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع
                            ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس
                            عشر
                            عندما قامت مطبعة
                            مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص،
                        </span>
                    </p>
                </div>
                <div class="grid md:grid-cols-4 pt-6 gap-4 ">
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4  ">
                        <img src="{{ asset('assets/img/media-icon-4.png') }}"
                            class="w-[50px] aspect-square lg:w-[100px]" alt="media-icon">
                        <div class="flex md:items-start items-center flex-col">
                            <div class="text-white lg:text-4xl text-xl font-bold capitalize leading-9">
                                2122
                            </div>
                            <div class="text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                ساعة تدريب</div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4   ">
                        <img src="{{ asset('assets/img/media-icon2.png') }}"
                            class="w-[50px] aspect-square lg:w-[100px]" alt="media-icon2">
                        <div class="flex md:items-start items-center flex-col">
                            <div class="text-white lg:text-4xl text-xl font-bold  capitalize leading-9">
                                490
                            </div>
                            <div
                                class=" text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                ساعة تدريب فى سوق العمل</div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4   ">
                        <img src="{{ asset('assets/img/media-icon.png') }}" class="w-[50px] aspect-square lg:w-[100px]"
                            alt="media-icon">
                        <div class="flex md:items-start items-center flex-col ">
                            <div class=" text-white lg:text-4xl text-xl font-bold  capitalize leading-9">
                                5
                            </div>
                            <div class="text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                فصول تدريبية</div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4 ">
                        <img src="{{ asset('assets/img/media-icon-3.png') }}"
                            class="w-[50px] aspect-square lg:w-[100px]" alt="media-icon">
                        <div class="flex md:items-start items-center flex-col ">
                            <div class=" text-white lg:text-4xl text-xl font-bold capitalize leading-9">
                                490
                            </div>
                            <div class="text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                شهور تدريب في احد شركات التسويق والإعلانات</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layout-component>
