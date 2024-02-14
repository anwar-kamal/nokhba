<div>
    <section class="container !pt-0">
        <div class="grid lg:grid-cols-3 gap-[60px] h-screen relative">
            <div class="lg:order-2">
                <div class="bg-lightgray p-8 rounded-2xl">
                    @if (count($page->course_includes) > 0)
                        <div class="diploma-title !md:text-center !text-start">{{ __('messages.This course includes') }}:
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col gap-8 md:justify-between flex-wrap">
                                <div class="w-full flex justify-start gap-2">
                                    <img src="{{ getImage('assets/img/hours_Icon.svg') }}" alt="hours_Icon"
                                        class=" w-6 h-6">
                                    <p
                                        class="text-start textblack text-lg font-normal font-['Open Sans'] leading-[21px]">
                                        {{ $page->course_includes[0]->number_of_hours }} ساعة</p>
                                </div>
                                <div class="w-full flex justify-start gap-2">
                                    <img src="{{ getImage('assets/img/lessons_Icon.svg') }}" alt="lessons_Icon"
                                        class=" w-6 h-6">
                                    <p
                                        class="text-start textblack text-lg font-normal font-['Open Sans'] leading-[21px]">
                                        {{ $page->course_includes[0]->number_of_lessons }} دروس</p>
                                </div>
                                <div class="w-full flex justify-start gap-2">
                                    <img src="{{ getImage('assets/img/course_completion_certificate.svg') }}"
                                        alt="course_completion_certificate" class=" w-6 h-6">
                                    <p
                                        class="text-start textblack text-lg font-normal font-['Open Sans'] leading-[21px]">
                                        شهادة إتمام الدورة</p>
                                </div>
                                <div class="w-full flex justify-start gap-2">
                                    <img src="{{ getImage('assets/img/level.svg') }}" alt="level" class=" w-6 h-6">
                                    <p
                                        class="text-start textblack text-lg font-normal font-['Open Sans'] leading-[21px]">
                                        {{ $page->course_includes[0]->level }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="cent flex-col mt-8 gap-4">
                        <button
                            class="py-2 overflow-hidden flex items-center justify-center gap-3 md:gap-0.375 rounded-xl text-white bg-[#9F1916] font-semibold transition duration-1000 w-full cent">
                            <a href="#" class="text-center text-lg font-semibold capitalize leading-[14px] py-2">
                                {{ __('messages.buy now') }}</a>
                        </button>
                        @livewire('add-to-cart-component', ['model_id' => $page->toArray()['diploma_system_field']['value'], 'model_type' => 'App\Models\ProductOffer', 'title' => $page->toArray()['card_title_ar'], 'image' => $page->toArray()['card_image'] ? $page->toArray()['card_image']['path'] : null])
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="bg-lightgray p-8 rounded-2xl ">
                    <div class=" flex justify-between items-center">
                        @php
                            $title = langContent('title');
                            // $rating = langContent('rating');
                        @endphp
                        <div class="diploma-title !md:text-center !text-start">
                            {{ $page->$title ? $page->$title : $page->title }}
                        </div>
                    </div>
                    @php
                        $content_details = langContent('content_details');
                        $diploma_objectives = langContent('diploma_objectives');
                        $advantages_courses = langContent('advantages_courses');
                    @endphp
                    <div class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] capitalize leading-7">
                        {{ $page->$content_details }}</div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 mt-5"></div>
                    <div class="diploma-title !md:text-center !text-start">
                        {{ __('messages.Detailed objectives of the diploma') }}</div>
                    <div class="flex flex-col gap-8 md:justify-between flex-wrap">
                        @foreach ($page->$diploma_objectives as $diploma_objective)
                            <div class="w-full flex justify-start gap-1">
                                <img src="{{ getImage('assets/img/task_alt_FILL0_wght.png') }}" alt="task_alt_blue"
                                    class="w-6 h-6">
                                <p
                                    class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] leading-[21px]">
                                    {{ $diploma_objective }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 mt-5"></div>
                    @if ($page->advantages_courses)
                        <div class="diploma-title !md:text-center !text-start">
                            {{ __('messages.Detailed objectives of the diploma') }}</div>
                        <div class="flex flex-col gap-8 md:justify-between flex-wrap">
                            @foreach ($page->advantages_courses as $advantages_courses)
                                <div class="w-full flex justify-start gap-1">
                                    <img src="{{ getImage('assets/img/task_alt_FILL0_wght.png') }}" alt="task_alt_blue"
                                        class=" w-6 h-6">
                                    <p
                                        class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] leading-[21px]">
                                        {{ $advantages_courses }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <h2 class="section-title text-neutral-800 cent before:bg-center mb-10">
            {{ __('messages.courses') }}</h2>
        <div class="cent flex-wrap gap-8 justify-center">
            @php
                $other_diploma_nominations = langContent('other_diploma_nominations');
            @endphp
            @foreach ($page->$other_diploma_nominations as $key => $course)
                @livewire('card-course-component', ['course' => $course->toArray()])
            @endforeach
        </div>
    </section>
</div>
