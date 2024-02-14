<footer class="-my-28" >
    <div style=" overflow: hidden;" class=" md:h-[125px] h-16"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C173.53,266.95 363.71,-81.39 499.15,112.02 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #F7F8FA;"></path>
        </svg></div>
    <div class=" bg-[#F7F8FA] pb-10 pt-5 ">
        <div class="md:grid  grid-flow-col container items-start justify-between gap-5 text-center md:text-start">
            <div class=" col-span-2 flex items-center py-5 md:py-0 md:items-start justify-center flex-col gap-2">
                <h5>
                    <a href="{{ get_page_permalink('home') }}">
                        <img src="{{ getImage(getGlobal('logo')['logo']) }}" width="75" height="75"
                            alt="logo">
                    </a>
                </h5>
                <p>
                <div class="max-w-[500px] text-zinc-600 text-lg font-normal  capitalize leading-9">
                    <span class="rtl:hidden">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Eum,
                        quaerat, id
                        est vel eius optio quasi assumenda magni cupiditate nesciunt officiis
                        exercitationem et dolores.
                        Quasi tempore accusantium eaque ducimus dolorem?</span>
                    <span class="ltr:hidden">
                        لوريم إيبسوم هو ببساطة نص
                        شكلي (بمعنى
                        أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع
                    </span>
                </div>
                </p>
            </div>
            @php
                $title = langContent('title');
            @endphp
            @foreach (Statamic::tag('nav:footer') as $navItem)
                <div class="flex items-center py-5 md:py-0 md:items-start justify-center flex-col gap-2">
                    <h5 class="text-neutral-700 text-xl font-semibold pb-2 capitalize leading-tight">
                        {{ $navItem[$title] }}</h5>
                    <ul>
                        @foreach ($navItem['children'] as $navItemChildren)
                            <li><a
                                    href="{{ get_page_permalink($navItemChildren['url']) }}">{{ $navItemChildren[$title] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            {{-- <div class="flex items-center py-5 md:py-0 md:items-start justify-center flex-col gap-2">
                <h5 class="text-neutral-700 text-xl font-semibold  pb-2 capitalize leading-tight">
                    سياسات واحكام</h5>
                <ul>
                    <li><a href="#">الشروط والأحكام</a></li>
                    <li><a href="#">الاسئلة الشائعة</a></li>
                    <li><a href="#">حقوق الملكية الفكرية</a></li>
                </ul>
            </div>
            <div class="flex items-center py-5 md:py-0 md:items-start justify-center flex-col gap-2">
                <h5 class="text-neutral-700 text-xl font-semibold  pb-2 capitalize leading-tight">
                    للتواصل معنا</h5>
                <ul>
                    <li><a href="#">خدمة العملاء</a></li>
                    <li><a href="#">تواصل معنا</a></li>
                </ul>
            </div> --}}
        </div>
        <div class="w-full container h-0.5 bg-neutral-200 mt-3"></div>
        @php
            $title = langContent('title');
        @endphp
        <div class=" flex flex-col md:flex-row justify-between items-center container gap-4 py-8">
            <div class="pb-4 text-center md:text-start">
                <span class="text-neutral-700 md:text-lg text-xs font-semibold  capitalize leading-[18px]">
                    {{ getGlobal('copyright')[$title] }}</span>
            </div>
            <div class=" flex gap-4 lg:scale-125">
                <img src="{{ asset('assets/img/tamara.png') }}" alt="tamara" class="aspect-[2/1] max-w-[50px]">
                <img src="{{ asset('assets/img/tabby.png') }}" alt="tabby" class="aspect-[2/1] max-w-[50px]">
                <img src="{{ asset('assets/img/master.png') }}" alt="master" class="aspect-[2/1] max-w-[50px]">
                <img src="{{ asset('assets/img/mada.png') }}" alt="mada" class="aspect-[2/1] max-w-[50px]" />
            </div>
        </div>
    </div>
</footer>
