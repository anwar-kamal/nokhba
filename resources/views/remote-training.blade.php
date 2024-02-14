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
        @php
            $distance_learning = langContent('distance_learning');
        @endphp
        <section id="distance_learning" class="relative">
            <div class="container grid lg:grid-cols-2 gap-5 ">
                <div class="flex-col justify-start gap-4 inline-flex" data-aos="zoom-out" data-aos-duration="1000"
                    data-aos-easing="ease-in-out">
                    <div class="flex gap-2">
                        <h2 class="section-title text-neutral-800 flex gap-4 rtl:before:bg-right ltr:before:bg-left">
                            {{ $page->$distance_learning[0]->title }}
                        </h2>
                        <img src="{{ asset('assets/img/start.png') }}" alt="start" width="64" height="64">
                    </div>
                    <div class="sub-title text-zinc-600 ">
                        <span>{{ $page->$distance_learning[0]->content }}</span>
                    </div>
                </div>
                <div class="relative  flex flex-col gap-8">
                    @foreach ($page->$distance_learning[0]->list_with_icon as $list)
                        <div class="lg:w-[475px] custom__drop__shadow w-full h-[82px] @if ($list->order_show == 2) lg:rtl:mr-10 lg:ltr:ml-10 @endif bg-[#f7f7f7] rounded-2xl grid   gap-x-4 grid-cols-6 rtl:pr-3 ltr:pl-3 "
                            data-aos="fade-right" data-aos-duration="500"
                            @if ($list->order_show == 1) data-aos-delay="300" @elseif($list->order_show == 2) data-aos-delay="1000" @else data-aos-delay="1500" data-aos-delay="50" @endif
                            data-aos-easing="ease-in-out">
                            <div class=" col-span-1 flex justify-between items-center relative">
                                @if ($list->order_show == 1)
                                    <div
                                        class="w-[3px] h-[45px] bg-[#2B6DF5] rounded-2xl absolute  rtl:-right-3 -left-3">
                                    </div>
                                @elseif($list->order_show == 2)
                                    <div
                                        class="w-[3px] h-[45px]  bg-[#AE78B6] rounded-2xl absolute  rtl:-right-3 -left-3">
                                    </div>
                                @else
                                    <div
                                        class="w-[3px] h-[45px] bg-[#DBAC35]  rounded-2xl absolute  rtl:-right-3 -left-3">
                                    </div>
                                @endif
                                <img src="{{ getImage($list->icon) }}" alt="icon">
                            </div>
                            <div class="col-span-5 flex justify-between items-center">
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
        <section class=" container grid justify-center">
            <h2 class="section-title before:bg-center cent">لماذا تختار التعليم عن بعد؟</h2>
            <div class="relative pb-10">
                <div class="sub-title text-center mx-auto" style="max-width: 1150px"> يمكن للنساء السعوديات
                    الوصول إلى
                    محتوى
                    تعليمي متميز ومتنوع من خلال الإنترنت، وذلك في أي وقت ومن أي مكان يناسبهن. يتميزالتعليم عن بُعد
                    بعدة
                    جوانب تجعله أساسيًا وحيويًا في تعزيز دور المرأة السعودية في المجتمع وتمكينها من تحقيق طموحاتها
                    العلمية والمهنية، ومن هذه الجوانب:
                </div>
                <div class=" absolute -bottom-6 flex justify-between items-center w-full z-[55] px-2 ">
                    <img src="{{ asset('assets/img/vector-remote-right.png') }}" alt="" class=" max-md:h-12 "
                        data-aos="flip-right" data-aos-delay="300" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                    <img src="{{ asset('assets/img/vector-remote-left.png') }}" alt="" class=" max-md:h-12 "
                        data-aos="flip-left" data-aos-delay="300" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                </div>
            </div>
            <div class="grid md:grid-cols-4 justify-center  my-10 gap-8 px-2 auto-rows-auto grid-flow-row">
                <div
                    class=" rounded-3xl md:col-span-2  custom__drop__shadow  md:p-6 p-4 grid justify-center md:gap-4 gap-2 text-center">
                    <div class="cent"><img src="{{ asset('assets/img/remote1.png') }}" alt=""></div>
                    <h2 class=" sub-title font-semibold">التواصل والمرونة</h2>
                    <p class=" text-neutral-700 leading-8">توفر منصة نخبة القادة للدبلومات النسائية تجربة تعليمية
                        تتيح للطالبات التواصل المباشر مع المدربين والمعلمين وزميلاتهن الطالبات عبر منصة إلكترونية
                        مبتكرة. وبفضل هذا التواصل، يمكن للطالبات طرح الأسئلة ومناقشة المواضيع وتبادل الأراء
                        والأفكار، مما يساهم في تعزيز تفاعلهن الأكاديمي وتنمية مهاراتهن التواصلية والتعاونية</p>
                </div>
                <div
                    class=" rounded-3xl md:col-span-2  custom__drop__shadow  md:p-6 p-4 grid justify-center md:gap-4 gap-2 text-center">
                    <div class="cent"><img src="{{ asset('assets/img/remote2.png') }}" alt=""></div>
                    <h2 class=" sub-title font-semibold">الوصول إلى تعليم عالي الجودة</h2>
                    <p class=" text-neutral-700 leading-8">يعتبر التعليم عن بُعد فرصة للنساء السعوديات للوصول إلى
                        تعليم عالي الجودة وبرامج تدريبية متخصصة. فهذه المنصة تضم أعضاء هيئة تدريس متميزين وخبراء في
                        مختلف المجالات، مما يسمح للطالبات بالأستفادة من خبراتهم ومعرفتهم العميقة في مجالاتهم المختصة
                    </p>
                </div>
                <div
                    class=" rounded-3xl md:col-span-2  custom__drop__shadow  md:p-6 p-4 grid justify-center md:gap-4 gap-2 text-center">
                    <div class="cent"><img src="{{ asset('assets/img/remote3.png') }}" alt=""></div>
                    <h2 class=" sub-title font-semibold">المرونة الزمنية والمكانية</h2>
                    <p class=" text-neutral-700 leading-8">يعتبر التعليم عن بُعد حلاً مثاليًا للنساء اللاتي يواجهن
                        قيودًا محددة في الوقت والمكان. يمكن للطالبات تنظيم وقتهن بمرونة ودراسة المواد التعليمية في
                        أوقات مناسبة لهن، وذلك دون الحاجة إلى التواجد الجسدي في مكان محدد. وهذا يتيح لهن فرصة المزيد
                        من التوازن بين التعليم والحياة الشخصية والأحترافية</p>
                </div>
                <div
                    class=" rounded-3xl md:col-span-2  custom__drop__shadow  md:p-6 p-4 grid justify-center md:gap-4 gap-2 text-center">
                    <div class="cent"><img src="{{ asset('assets/img/remote4.png') }}" alt=""></div>
                    <h2 class=" sub-title font-semibold">تنمية المهارات التقنية</h2>
                    <p class=" text-neutral-700 leading-8"> يعتبر التعليم عن بُعد عبر الإنترنت فرصة لتنمية المهارات
                        التقنية لدى النساء السعوديات. فبفضل استخدام التكنولوجيا في عملية التعلم، يصبح لدى الطالبات
                        فرصة لإكتساب مهارات التعامل مع الأدوات والتطبيقات التقنية المختلفة، مما يعزز قدرتهن على
                        الإبتكار والتكيف مع التطورات التكنولوجية في سوق العمل</p>
                </div>
                <div
                    class=" rounded-3xl md:col-start-2 md:col-end-4 custom__drop__shadow  md:p-6 p-4 grid justify-center md:gap-4 gap-2 text-center">
                    <div class="cent"><img src="{{ asset('assets/img/remote5.png') }}" alt=""></div>
                    <h2 class=" sub-title font-semibold">تعزيز الثقة و الإستقلالية</h2>
                    <p class=" text-neutral-700 leading-8">يساهم التعليم عن بُعد في تعزيز الثقة و الإستقلالية لدى
                        النساء السعوديات. فعندما يتعلمن عبر هذه المنصة، يصبح لديهن القدرة على اتخاذ قراراتهن
                        التعليمية بناء ًعلى احتياجاتهن الشخصية والمهنية، وتنمية مهاراتهن بمعدل يتناسب مع قدراتهن
                        ومتطلباتهن الحياتية</p>
                </div>
            </div>
        </section>

    </x-slot>
</x-layout-component>
