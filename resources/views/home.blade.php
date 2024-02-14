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
    <x-slot name="customPageScript">
        <script>
            // Update the countdown every second
            const countdownInterval = setInterval(updateCountdown, 1000)

            function updateCountdown() {
                const currentDate = new Date().getTime()
                const timeRemaining = targetDate - currentDate
                if (timeRemaining <= 0) {
                    clearInterval(countdownInterval) // Stop the countdown when the target date is reached
                } else {
                    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24))
                    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
                    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60))
                    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000)
                    const daysId = document.getElementById('days')
                    const hoursId = document.getElementById('hours')
                    const minutesId = document.getElementById('minutes')
                    const secondsId = document.getElementById('seconds')
                    if (daysId && hoursId && minutesId && secondsId) {
                        daysId.innerText = formatTime(days)
                        hoursId.innerText = formatTime(hours)
                        minutesId.innerText = formatTime(minutes)
                        secondsId.innerText = formatTime(seconds)
                    }
                }
            }

            function formatTime(time) {
                return time < 10 ? '0' + time : time
            }
        </script>
    </x-slot>
    <x-slot name="content">
        <main>
            <div class="swiper mainSwiper text-white">
                <div class="swiper-wrapper">
                    @php
                        $hero_section = langContent('hero_section');
                    @endphp
                    @foreach ($page->$hero_section as $slide)
                        <div class="swiper-slide w-full relative">
                            @if ($slide->main_image)
                                <img src="{{ getImage($slide->main_image) }}" alt="{{ $slide->main_image['alt'] }}"
                                    class="aspect-[1/1] w-full max-md:block hidden">
                            @endif
                            @if ($slide->main_image)
                                <img src="{{ getImage($slide->main_image) }}" alt="{{ $slide->main_image['alt'] }}"
                                    class="aspect-[5/1.975] w-full max-md:hidden block">
                            @endif
                            <div
                                class="absolute h-full inset-0 w-full rtl:bg-gradient-to-l ltr:bg-gradient-to-r from-black">
                                <div
                                    class="2xl:w-1/2 lg:w-2/3 absolute top-0 rtl:right-0 md:p-20 p-4 cent h-full z-40  ">
                                    <div>
                                        <h2
                                            class=" max-md:text-xl max-md:text-center max-lg:text-3xl max-3xl:text-4xl text-5xl pb-4">
                                            {{ $slide->title }}
                                        </h2>
                                        <p
                                            class="max-md:text-sm max-md:text-center max-lg:text-lg max-3xl:text-xl text-2xl md:leading-10 tracking-wide xl:leading-[50px] text-zinc-100 ">
                                            <span>{{ $slide->content ?? ' ' }}</span>
                                        </p>
                                        <div class="mt-8 z-50 cent md:block gap-6">
                                            <button class="button-primary cent gap-2  !border-none">
                                                {{ $slide->word_in_button }}
                                                <i class="rtl:hidden fa-solid fa-arrow-right-long "></i>
                                                <i class="ltr:hidden fa-solid fa-arrow-left-long "></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-0 p-3 right-0 max-md:hidden">
                                <img src="{{ asset('assets/img/mask-group.png') }}" alt="mask-group">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-14 "></div>
            </div>
        </main>
        @php
            $about_us = langContent('about_us');
        @endphp
        <section id="about_section" class="container">
            <div class="grid md:grid-cols-2 justify-start gap-5">
                {{-- <div class="relative md:flex justify-center items-center hidden" data-aos="fade-down-left"
                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <div class="image-bg bg-no-repeat bg-contain bg-bottom overflow-hidden">
                        @if ($page->$about_us[0]->main_image)
                            <img src="{{ getImage($page->$about_us[0]->main_image) }}" alt="woman"
                                class="max-h-[400px] h-full aspect-square rounded-b-full mr-2 pt-10 transform ltr:scale-x-[-1]">
                        @endif
                    </div>
                    <div class="absolute rtl:right-0 ltr:left-0 top-0 transform  ltr:scale-x-[-1]">
                        <img src="{{ getImage('assets/img/yellow-vector.png') }}" alt="yellow-vector">
                    </div>
                </div> --}}
                <div class="relative md:flex justify-center items-center hidden" data-aos="fade-down-left"
                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                    @if ($page->$about_us[0]->main_image)
                        <img src="{{ getImage($page->$about_us[0]->main_image) }}" alt="woman"
                            class="max-h-[400px] h-full aspect-square rounded-b-full mr-2 pt-10 transform ltr:scale-x-[-1]">
                    @endif
                </div>
                <div class=" z-50">
                    <div class="flex-col justify-start gap-4 inline-flex" data-aos="fade-right" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                        <h2 class="section-title text-neutral-800 before:bg-right ltr:before:bg-left">
                            {{ $page->$about_us[0]->title }}
                        </h2>
                        <div class="sub-title  text-zinc-600">
                            <span class="ltr:hidden">{{ $page->$about_us[0]->content }}</span>
                        </div>
                        <div class="grid md:grid-cols-2 gap-x-20 gap-y-6 justify-between">
                            @foreach ($page->$about_us[0]->list as $key => $list)
                                @php
                                    $img = ['task_alt_blue.png', 'task_alt_yellow.png', 'task_alt_orange.png', 'task_alt_green.png'];
                                @endphp
                                <div class="cent gap-2">
                                    <div class="w-8 h-8 relative flex-col justify-start items-start inline-flex">
                                        @if (array_key_exists($key, $img))
                                            <img src="{{ asset("assets/img/$img[$key]") }}" alt="{{ $img[$key] }}">
                                        @else
                                            <img src="{{ asset('assets/img/task_alt_blue.png') }}" alt="task_alt_blue">
                                        @endif
                                    </div>
                                    <p class=" text-zinc-600 text-sm  leading-[14px]">{{ $list }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="relative pt-4 block rtl:mr-10 ltr:ml-10">
                            <a href="{{ URL::to('/about-us') }}">
                                <button class="button-primary mt-8 relative">{{ __('messages.view more') }}
                                    <div
                                        class="absolute ltr:-left-12 rtl:-right-12 bottom-5  transform ltr:scale-x-[-1]">
                                        <img src="{{ asset('assets/img/vector-arrow.png') }}" alt="vector-arrow">
                                    </div>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
            $womens_diplomas = langContent('womens_diplomas');
        @endphp
        <div class=" md:-my-20 -my-10">
            <div style=" overflow: hidden;" class=" md:h-[150px] h-12"><svg viewBox="0 0 500 150"
                    preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C173.53,266.95 363.71,-81.39 499.15,112.02 L500.00,150.00 L0.00,150.00 Z"
                        style="stroke: none; fill: #F7F8FA;"></path>
                </svg></div>
            <div id="womens_diplomas" class="relative overflow-hidden pb-6" style="background: #F7F8FA;">
                <div class="container grid gap-8 ">
                    <h2 class="section-title text-center text-neutral-800 cent before:bg-center">
                        {{ $page->$womens_diplomas[0]->title }}</h2>
                    <div class="flex flex-wrap justify-center gap-5">
                        @foreach ($page->$womens_diplomas[0]->diplomas as $diploma)
                            @livewire('card-diploma-component', ['diploma' => $diploma->toArray()])
                        @endforeach
                    </div>
                </div>
            </div>
            <div style=" overflow: hidden;" class=" md:h-[150px] h-12 rotate-180"><svg viewBox="0 0 500 150"
                    preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C173.53,266.95 363.71,-81.39 499.15,112.02 L500.00,150.00 L0.00,150.00 Z"
                        style="stroke: none; fill: #F7F8FA;"></path>
                </svg></div>
        </div>
        {{-- <section id="woman_section" class="w-full relative bg-section ">
            <div>
                <div class="container grid md:grid-cols-2 gap-5 max-h-[450px]  inset-0 ">
                    <div class="flex-col justify-start gap-4 inline-flex" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                        <div class="relative px-0.5 text-center md:text-start">
                            <h2 class="section-title before:bg-right ltr:before:bg-left relative">
                                {{ $page->$woman_section[0]->title }}
                                <div class="absolute top-5 rtl:-left-1 ltr:-right-1 ltr:rotate-180">
                                    <img src="{{ asset('assets/img/quots.png') }}" alt="" class="md:w-8 w-6 ">
                                </div>
                            </h2>
                            <p class="sub-title text-zinc-600">
                                {{ $page->$woman_section[0]->content }}
                            </p>
                            <div>
                                <button class="button-primary mt-8 relative"> {{ __('messages.view more') }}
                                    <div
                                        class="absolute ltr:-right-12 rtl:-left-12 bottom-5 transform rtl:scale-x-[-1]">
                                        <img src="{{ asset('assets/img/vector-arrow.png') }}" alt="">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="relative hidden md:flex justify-center items-center" data-aos="fade-down"
                        data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <div class=" h-full overflow-hidden">
                            <img src="{{ getImage($page->$woman_section[0]->main_image) }}" alt=""
                                class="max-h-[400px] h-full aspect-square ">
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        {{-- @php
            $womens_diplomas = langContent('womens_diplomas');
        @endphp
        <section id="womens_diplomas" class="container">
            <h2 class="section-title text-neutral-800 cent before:bg-center mb-10">
                {{ $page->$womens_diplomas[0]->title }}
            </h2>
            <div class="cent flex-wrap gap-8 justify-center">
                @foreach ($page->$womens_diplomas[0]->card_diploma as $key => $card_diploma)
                    @livewire('card-diploma-component', ['key' => $key])
                @endforeach
            </div>
        </section> --}}




        @php
            $courses = langContent('courses');
        @endphp
        <section id="courses" class="w-full relative ">
            <div class="container grid gap-8">
                <h2 class="section-title text-center text-neutral-800 cent before:bg-center">
                    {{ $page->$courses[0]->title }}
                </h2>
                <div class="flex flex-wrap justify-center gap-5">
                    @foreach ($page->$courses[0]->products_courses as $course)
                        @livewire('card-course-component', ['course' => $course->toArray()])
                    @endforeach
                </div>
            </div>
        </section>







        @php
            $next_semester = langContent('next_semester');
        @endphp
        <script>
            var dateString = <?php echo json_encode($page->$next_semester[0]->count_down_date); ?>;
            var dateObject = new Date(dateString);
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = dateObject.toLocaleDateString('en-US', options);
            var countDownTime = <?php echo json_encode($page->$next_semester[0]->count_down_time); ?>;
            const targetDate = new Date(`${formattedDate} ${countDownTime}`).getTime();
        </script>
        <section id="sec-five" class=" bg-[#101113] relative ">
            <div class="absolute top-0 right-0">
                <img src="{{ asset('assets/img/top-right.png') }}" alt="top-right">
            </div>
            <div class="absolute bottom-0 right-0">
                <img src="{{ asset('assets/img/bottom-right.png') }}" alt="bottom-right"
                    class="max-md:w-[126px] max-md:h-[141px]">
            </div>
            <div class="absolute bottom-0 left-0">
                <img src="{{ asset('assets/img/bottom-left.png') }}" alt="bottom-left"
                    class="max-md:w-[126px] max-md:h-[141px]">
            </div>
            <div class="absolute top-0 left-0">
                <img src="{{ asset('assets/img/top-left.png') }}" alt="top-left">
            </div>

            <div class="container cent flex-col text-white">
                <h2 class="section-title cent before:bg-center mb-10 !text-white">
                    {{ $page->$next_semester[0]->title }}
                </h2>
                <div class="sub-title opacity-75 text-center max-w-[991px]">
                    <span class="w-full !text-white">{{ $page->$next_semester[0]->content }}</span>
                </div>
                <div class="cent md:gap-8 gap-x-16 gap-y-6 flex-wrap py-5" id="countdown">
                    <div
                        class="rounded-full md:w-[115px] w-[85px] md:h-[115px] h-[85px] bg-[#67BF94] cent md:gap-3 flex-col">
                        <div class=" text-4xl font-bold countdown-item"> <span id="days">00 </span></div>
                        <div>{{ __('messages.Day') }}</div>
                    </div>
                    <div
                        class=" rounded-full md:w-[115px] w-[85px] md:h-[115px] h-[85px] bg-[#2B6DF5] cent md:gap-3 flex-col">
                        <div class=" text-4xl font-bold countdown-item"><span id="hours">00</span></div>
                        <div>{{ __('messages.Hours') }}</div>
                    </div>
                    <div
                        class=" rounded-full md:w-[115px] w-[85px] md:h-[115px] h-[85px] bg-[#D9AC36] cent md:gap-3 flex-col">
                        <div class=" text-4xl font-bold countdown-item"><span id="minutes">00</span></div>
                        <div>{{ __('messages.Minutes') }}</div>
                    </div>
                    <div
                        class=" rounded-full md:w-[115px] w-[85px] md:h-[115px] h-[85px] bg-[#AC7AB5] cent md:gap-3 flex-col">
                        <div class=" text-4xl font-bold countdown-item"><span id="seconds">00 </span></div>
                        <div>{{ __('messages.Seconds') }}</div>
                    </div>
                </div>
            </div>
        </section>

        @php
            $distance_learning = langContent('distance_learning');
        @endphp
        <section id="distance_learning" class="relative">
            <div class="container grid lg:grid-cols-2 gap-5">
                <div class="flex-col justify-start gap-4 inline-flex" data-aos="zoom-out" data-aos-duration="1000"
                    data-aos-easing="ease-in-out">
                    <div class="flex gap-2">
                        <h2 class="section-title text-neutral-800 flex gap-4 rtl:before:bg-right ltr:before:bg-left">
                            {{ $page->$distance_learning[0]->title }}
                        </h2>
                        <img src="{{ asset('assets/img/start.png') }}" alt="start" width="64"
                            height="64">
                    </div>
                    <div class="sub-title text-zinc-600 ">
                        <span>{{ $page->$distance_learning[0]->content }}</span>
                    </div>
                    <div>
                        <a href="{{ URL::to('/remote-training') }}">
                            <button class="button-primary mt-8 relative max-lg:hidden">
                                {{ __('messages.view more') }}
                                <div class="absolute rtl:-left-12 ltr:-right-12 bottom-5 transform rtl:scale-x-[-1]">
                                    <img src="{{ asset('assets/img/vector-arrow.png') }}" alt="vector">
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="relative  flex flex-col gap-8">
                    @foreach ($page->$distance_learning[0]->list_with_icon as $list)
                        <div class="lg:w-[475px] w-full h-[82px] custom__drop__shadow border border-gray-50 @if ($list->order_show == 2) lg:rtl:mr-10 lg:ltr:ml-10 @endif  rounded-2xl grid   gap-x-4 grid-cols-6 rtl:pr-3 ltr:pl-3 "
                            data-aos="fade-right" data-aos-duration="1000"
                            @if ($list->order_show == 1) data-aos-delay="300" @elseif($list->order_show == 2) data-aos-delay="700" @else data-aos-delay="1000" @endif
                            data-aos-easing="ease-in-out">
                            <div class=" col-span-1 flex justify-between items-center relative">
                                @if ($list->order_show == 1)
                                    <div
                                        class="w-[3px] h-[45px] bg-[#2B6DF5] rounded-2xl absolute  rtl:-right-3 -left-3">
                                    </div>
                                @elseif($list->order_show == 2)
                                    <div
                                        class="w-[3px] h-[45px] bg-[#DBAC35] rounded-2xl absolute  rtl:-right-3 -left-3">
                                    </div>
                                @else
                                    <div
                                        class="w-[3px] h-[45px] bg-[#AE78B6] rounded-2xl absolute  rtl:-right-3 -left-3">
                                    </div>
                                @endif
                                <img src="{{ getImage($list->icon) }}" alt="icon">
                            </div>
                            <div class=" col-span-5 flex justify-between items-center">
                                <div class=" flex-col justify-center items-start gap-3 inline-flex">
                                    <div class=" text-neutral-800 text-base font-semibold capitalize leading-none">
                                        {{ $list->title_list }}</div>
                                    <div class=" text-zinc-600 text-sm  leading-[14px]">{{ $list->sub_content_list }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <button class="button-primary mt-8 relative lg:hidden">
                            {{ __('messages.view more') }}
                            <div class="absolute rtl:-left-12 ltr:-right-12 bottom-5 transform rtl:scale-x-[-1]">
                                <img src="{{ asset('assets/img/vector-arrow.png') }}" alt="vector">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section id="we_got_the_best_results"
            class="relative parallax-container md:h-[450px] h-[750px] overflow-hidden  ">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="container cent flex-col  absolute text-center text-white inset-0 py-6">
                <div class="flex-col justify-center items-center gap-6 inline-flex">
                    <div class="text-center text-white md:text-[28px] text-lg font-bold capitalize leading-7">
                        لقد حصلنا على أفضل النتائج</div>
                    <p
                        class="max-w-[991px] text-center text-neutral-200 md:text-lg text-sm  capitalize md:leading-10 leading-6 line-clamp-4 ">
                        <span class="rtl:hidden  text-center"> Lorem ipsum dolor, sit amet consectetur adipisicing
                            elit. Eum,
                            quaerat, id
                            est vel eius optio quasi assumenda magni cupiditate nesciunt officiis exercitationem
                            et dolores.
                            Quasi tempore accusantium eaque ducimus dolorem?</span>
                        <span class="ltr:hidden">
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
                            <div
                                class="text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                ساعة تدريب</div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4   ">
                        <img src="{{ asset('assets/img/media-icon2.png') }}"
                            class="w-[50px] aspect-square lg:w-[100px]" alt="media-icon2">
                        <div class="flex md:items-start items-center flex-col">
                            <div class="text-white lg:text-4xl text-xl font-bold  capitalize leading-9">
                                2122
                            </div>
                            <div
                                class=" text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                ساعة تدريب فى سوق العمل</div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4   ">
                        <img src="{{ asset('assets/img/media-icon.png') }}"
                            class="w-[50px] aspect-square lg:w-[100px]" alt="media-icon">
                        <div class="flex md:items-start items-center flex-col ">
                            <div class=" text-white lg:text-4xl text-xl font-bold  capitalize leading-9">
                                2122
                            </div>
                            <div
                                class="text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                فصول تدريبية</div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-center md:items-start items-center md:gap-4 ">
                        <img src="{{ asset('assets/img/media-icon-3.png') }}"
                            class="w-[50px] aspect-square lg:w-[100px]" alt="media-icon">
                        <div class="flex md:items-start items-center flex-col ">
                            <div class=" text-white lg:text-4xl text-xl font-bold capitalize leading-9">
                                2122
                            </div>
                            <div
                                class="text-neutral-200 md:text-xl capitalize leading-tight text-center md:text-start">
                                شهور تدريب في احد شركات التسويق والإعلانات</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
            $customers_saying = langContent('customers_saying');
        @endphp
        <section id="customers_saying" class="container ">
            <div>
                <h2 class="section-title cent before:bg-center mb-10">{{ $page->$customers_saying[0]->title }}</h2>
            </div>
            <div class="swiper ratingSwiper ">
                <div class="swiper-wrapper py-10">
                    @foreach ($page->$customers_saying[0]->card_stydent_opinion as $card)
                        <div
                            class="swiper-slide h-[236px] relative bg-white rounded-2xl border border-neutral-200 p-3 overflow-hidden">
                            <div class=" absolute ltr:-right-1 rtl:-left-1 -top-0.5 opacity-20 scale-110 transform">
                                <img src="{{ asset('assets/img/quots.png') }}" alt="">
                            </div>
                            <div class=" flex-col justify-center gap-5 flex">
                                <div class="justify-start items-center gap-3 inline-flex">
                                    <img class="w-[72px] h-[72px] rounded-full"
                                        src="{{ asset('assets/img/user-image.png') }}">
                                    <div class="flex-col justify-start gap-3 inline-flex">
                                        <div class="text-neutral-800 text-lg font-semibold capitalize leading-[18px]">
                                            {{ $card->name_student }}</div>
                                        <div class="text-start text-zinc-600 text-sm  leading-[14px]">
                                            {{ $card->career }}</div>
                                    </div>
                                </div>
                                <div class="text-neutral-700 line-clamp-4 text-sm leading-6 capitalize">
                                    <span>{{ $card->student_opinion }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-10"></div>
            </div>
        </section>
        <section class="cent  overflow-hidden relative w-full h-full  " id="formLast">
            <div class="absolute inset-0">
                <img src="{{ asset('assets/img/contact-fom-image.png') }}" class="w-full h-full">
            </div>
            <div class=" absolute inset-0" style="background: rgba(0, 0, 0, 0.436);">
            </div>
            <div class="grid md:grid-cols-2 z-50 gap-10 py-4 container">
                <div class="flex flex-col justify-center md:items-start items-center md:gap-4">
                    <h4 class="text-white pb-5 md:text-[28px] text-lg font-bold capitalize leading-7">
                        العروض الترويجية
                    </h4>
                    <p class="text-start text-[#E2E2E2] md:text-lg text-sm capitalize leading-9">
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
                @livewire('form-leads-component')
        </section>
    </x-slot>
</x-layout-component>
