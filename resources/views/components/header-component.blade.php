<div class="fixed bottom-20 z-[999] rtl:left-4 ltr:right-4 md:rtl:left-10 md:ltr:right-10 cursor-pointer ">
    <div class="cent bg-white md:w-16 w-10 md:h-16 h-10 shadow-xl border rounded-full drop-shadow-sm  my-6">
        <a href="https://api.whatsapp.com/send/?phone=966532231727&text&type=phone_number&app_absent=0&lang=ar"
            target="_blank">
            <img src="{{ asset('assets/whatsapp.png') }}" alt="">
        </a>
    </div>
    <div class=" justify-center items-center bg-white md:w-16 w-10 md:h-16 h-10 shadow-xl border border-zinc-100 rounded-full drop-shadow-sm my-6  "
        style="display: none" id="scrollingIcon">
        <i class="fa-solid fa-chevron-up md:text-2xl text-primary "></i>
    </div>
</div>
<div class="fixed inset-0  bg-white p-4  pb-8 z-[999] hidden  flex-col justify-between  " x-show="toggelMenu"
    :class="toggelMenu ? ' !flex' : ''" x-transition:enter="transition transform ease-out duration-500"
    x-transition:enter-start="opacity-0 rtl:translate-x-[-100px] ltr:translate-x-[100px]"
    x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition transform ease-in duration-500"
    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-[-100px]"
    x-data="{ open: false, openNoti: false }">

    <div>
        <div class="text-end flex justify-between items-center">
            <div id="logo">
                @if (basename(Request::path()) == 'dashboard')
                    <a href="/en"><img src="{{ getImage(getGlobal('logo')['logo']) }}" alt="logo"
                            class="aspect-square" width="75"></a>
                @else
                    <a href="{{ get_page_permalink('home') }}"><img src="{{ getImage(getGlobal('logo')['logo']) }}"
                            alt="logo" class="aspect-square" width="75"></a>
                @endif
            </div>
            <i class="fa-solid fa-x text-xl text-primary" @click="toggelMenu = false"></i>
        </div>
        <div class=" pt-8 gap-4  text-neutral-700 ">
            @if (auth('instructors')->user() || auth('customers')->user())
                <div>
                    <div class=" flex justify-between items-center cursor-pointer" x-on:click="open =! open">
                        <div class="cent gap-2">
                            <img src="https://wac-cdn.atlassian.com/dam/jcr:ba03a215-2f45-40f5-8540-b2015223c918/Max-R_Headshot%20(1).jpg?cdnVersion=1437"
                                alt="" class=" w-16 h-16 rounded-full overflow-hidden cursor-pointer">
                            <h2 class="">
                                محمد علي
                            </h2>
                        </div>
                        <div>
                            <i class="fa-solid fa-chevron-down" x-show="open"></i>
                            <i class="fa-solid fa-chevron-left " x-show="!open"></i>
                        </div>
                    </div>
                    <ul class=" mt-2 p-3 drop-shadow-sm border rounded-2xl " x-show="open"
                        x-transition:enter="transition transform ease-out duration-300"
                        x-transition:enter-start="opacity-0 rtl:translate-y-[-10px] ltr:translate-y-[10px]"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition transform ease-in duration-300"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-[-10px] ">
                        <li class="whitespace-nowrap">
                            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/icondashbord.svg') }}" alt="icondashbord">
                                <span class="sign-link  nav-link-ltr">لوحة التحكم</span>
                            </a>
                        </li>
                        <li class="whitespace-nowrap">
                            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/iconprofile.svg') }}" alt="iconprofile"><span
                                    class="sign-link  nav-link-ltr">الملف الشخصي</span>
                            </a>
                        </li>
                        <li class="whitespace-nowrap">
                            <a href="{{ route('logout') }}" class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/logout.svg') }}" alt="logout"><span
                                    class="sign-link nav-link-ltr">تسجيل الخروج</span>
                            </a>
                        </li>

                    </ul>
                </div>
            @else
                <div class="cent gap-4 text-primary font-bold py-2">
                    <a href="{{ get_page_permalink('login-student') }}" class="hover:scale-105">
                        <div class=" cent gap-2">
                            <img src="{{ asset('assets/img/group-red.png') }}" alt="group" />
                            {{ __('messages.Sign in student') }}
                        </div>
                    </a>
                    <img src="{{ asset('assets/img/line-toggel.png') }}" alt="toggel">
                    <a href="{{ get_page_permalink('login-trainees') }}" class="hover:scale-105">
                        <div class="cent gap-2 ">
                            <img src="{{ asset('assets/img/user-red.png') }}" alt="user" />
                            <p class=" leading-[14px]">
                                {{ __('messages.Sign in trainers') }}
                            </p>
                        </div>
                    </a>
                </div>
            @endif
        </div>
        <div class="h-px opacity-50 bg-neutral-200 rounded-[100px] my-5"></div>
        <nav class="flex flex-col gap-6 text-lg capitalize my-5">
            <ul class=" text-neutral-600 font-medium leading-[14px]">
                @php
                    $title = langContent('title');
                @endphp
                @foreach (Statamic::tag('nav:header') as $navItem)
                    <li class="{{ URL::to('/' . $navItem['url']) == Url::current() ? 'current-nav-link' : '' }}  py-3">
                        <a href="{{ get_page_permalink($navItem['url']) }}">{{ $navItem[$title] }}</a>

                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="h-px opacity-50 bg-neutral-200 rounded-[100px] my-5"></div>
        @if (basename(Request::path()) == 'dashboard')
            <div class="w-full flex justify-center">
                @if (App::getLocale() == 'ar')
                    <img src="{{ asset('assets/img/en.svg') }}" class="w-8 h-6 mt-1">
                    <a href="{{ route('change.locale', ['lang' => 'en']) }}">Eng</a>
                @else
                    <img src="{{ asset('assets/img/ar.png') }}" class="w-8 h-6">
                    <a href="{{ route('change.locale', ['lang' => 'ar']) }}">Ar</a>
                @endif
            </div>
        @endif
        {{-- notification  --}}
        <div class=" flex justify-between items-center cursor-pointer" x-on:click="openNoti =! openNoti">
            @if (auth('instructors')->user() || auth('customers')->user())
                <div class="cent gap-2 ">
                    <img src="{{ asset('assets/img/notfication.svg') }}" alt="cart"
                        class="md:w-7 md:h-7 w-6 h-6">
                    <h2 class="">
                        الأشعارات
                    </h2>
                </div>
            @endif
        </div>



    </div>

    <div>
        <div class="cent gap-8 invert pt-10">
            @foreach (getGlobal('icon_social')['social_media'] as $social)
                <a href="{{ $social['url'] }}" target="_blank">
                    @if ($social['icon'])
                        <img src="{{ getImage($social['icon']) }}" alt="insta" width="24" height="24" />
                    @endif
                </a>
            @endforeach
        </div>
    </div>


</div>

<div class="bg-neutral-900 py-1.5 hidden md:block z-[999]">
    <div class="container  flex justify-between items-center relative" x-data="{ open: false }">
        <div class="cent gap-4 text-white">
            @if (auth('instructors')->user() || auth('customers')->user())
                <div>
                    <img src="https://wac-cdn.atlassian.com/dam/jcr:ba03a215-2f45-40f5-8540-b2015223c918/Max-R_Headshot%20(1).jpg?cdnVersion=1437"
                        alt="" class=" w-11 h-11 rounded-full overflow-hidden cursor-pointer"
                        x-on:click="open =! open">
                    <ul class=" absolute bg-white p-4 top-12 rounded-2xl  z-[555555] drop-shadow border hidden"
                        x-show="open" :class="open ? ' !block ' : ''">
                        <li class="whitespace-nowrap">
                            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/icondashbord.svg') }}" alt="icondashbord">
                                <span class="sign-link  nav-link-ltr">لوحة التحكم</span>
                            </a>
                        </li>
                        <li class="whitespace-nowrap">
                            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/iconprofile.svg') }}" alt="iconprofile"><span
                                    class="sign-link nav-link-ltr">الملف الشخصي</span>
                            </a>
                        </li>
                        <li class="whitespace-nowrap">
                            <a href="{{ route('logout') }}" class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/logout.svg') }}" alt="logout"><span
                                    class="sign-link nav-link-ltr">تسجيل الخروج</span>
                            </a>
                        </li>

                    </ul>
                </div>
            @else
                <a href="{{ get_page_permalink('login-trainees') }}" class="hover:brightness-150">
                    <div class="cent gap-2">
                        <img src="{{ asset('assets/img/user.png') }}" alt="user" />
                        <p class="text-center text-sm ltr:mt-1">
                            {{ __('messages.Sign in trainers') }}
                        </p>
                    </div>
                </a>
                <img src="{{ asset('assets/img/line_2.png') }}" alt="line_2">
                <a href="{{ get_page_permalink('login-student') }}" class="hover:brightness-150">
                    <div>
                        <div class="text-center text-sm leading-[14px] cent gap-2">
                            <img src="{{ asset('assets/img/group-users.png') }}" alt="group-users" />
                            <p class="text-center text-sm leading-[14px]  ltr:mt-1">
                                {{ __('messages.Sign in student') }}
                            </p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="cent gap-8">
            @foreach (getGlobal('icon_social')['social_media'] as $social)
                <a href="{{ $social['url'] }}" target="_blank"><img src="{{ getImage($social['icon']) }}"
                        alt="{{ $social['icon']['alt'] ?? '' }}" width="24" height="24" /></a>
            @endforeach
        </div>
    </div>
</div>
<header class=" drop-shadow shadow-sm z-[51] sticky top-0 bg-white py-1.5 ">
        <div class="container py-4 flex justify-between items-center">
            <div class="cent gap-6">
                <div id="logo">
                    @if (basename(Request::path()) == 'dashboard')
                        <a href="/en"><img src="{{ getImage(getGlobal('logo')['logo']) }}" alt="logo"
                                class="aspect-square" width="75"></a>
                    @else
                        <a href="{{ get_page_permalink('home') }}"><img
                                src="{{ getImage(getGlobal('logo')['logo']) }}" alt="logo" class="aspect-square"
                                width="75"></a>
                    @endif
                </div>
                <nav
                    class="md:flex justify-center items-center hidden lg:gap-6 md:gap-3  text-center lg:text-lg md:text-sm capitalize">
                    @foreach (Statamic::tag('nav:header') as $navItem)
                        <a href="{{ get_page_permalink($navItem['url']) }}"
                            class="font-semibold nav-link nav-link-ltr {{ URL::to('/' . $navItem['url']) == Url::current() ? 'current-nav-link' : '' }}">
                            {{ $navItem[$title] }}
                        </a>
                    @endforeach
                </nav>
            </div>
            <div class="cent md:gap-6 gap-3">
                <img src="{{ asset('assets/img/vision2030.svg') }}" alt="Signature" class="aspect-[2/1] w-[80px]">
                <img class="hidden md:inline-flex" src="{{ asset('assets/img/line.png') }}" alt="line">
                <div class="relative">
                    <a href="/cart">
                        @if (session()->get('totalCardQty'))
                            <span
                                class="absolute -top-2.5 -right-2.5 rounded-full md:w-5 w-4 h-4 md:h-5 bg-[#9F1916] cent text-white text-sm">{{ session()->get('totalCardQty') }}</span>
                        @endif
                        <img src="{{ asset('assets/img/cart_black.svg') }}" alt="cart"
                            class="md:w-8 md:h-8 w-6 h-6">
                    </a>
                </div>
                @if (auth('instructors')->user() || auth('customers')->user())
                    <div>
                        <a href="#">
                            <img src="{{ asset('assets/img/notfication.svg') }}" alt="cart"
                                class="md:w-7 md:h-7 w-6 h-6">
                        </a>
                    </div>
                @endif
                @if (basename(Request::path()) == 'dashboard')
                    <div class="hidden md:block relative">
                        @if (App::getLocale() == 'ar')
                            <a href="{{ route('change.locale', ['lang' => 'en']) }}" class="flex items-center gap-1">
                                <img src="{{ asset('assets/img/en.svg') }}" class="w-8 h-6 mt-1">
                                <span>Eng</span>
                            </a>
                        @else
                            <a href="{{ route('change.locale', ['lang' => 'ar']) }}" class="flex items-center gap-1">
                                <span>Ar</span>
                                <img src="{{ asset('assets/img/ar.png') }}" class="w-8 h-6">
                            </a>
                        @endif
                    </div>
                @endif
                <button @click="toggelMenu =!toggelMenu" class="inline-flex md:hidden order-last relative">
                    <img src="{{ asset('assets/img/toggel.png') }}" width="35" height="35" alt="">
                </button>
            </div>
        </div>
</header>
