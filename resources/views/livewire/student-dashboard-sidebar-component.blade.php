<div>
    <aside class=" inset-0 absolute lg:hidden top-0  bg-white text-white  z-50 " x-show="aside">
        <ul class=" overflow-y-auto   sticky top-0 py-6">
            <li @click="aside = !aside"
                class="@if ($tab == 'dashboard') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('dashboard')"> <img src="{{ asset('assets/img/ta7akom.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.dashboard') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'courses' || $tab == 'course-details') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('courses')"> <img src="{{ asset('assets/img/dawart.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.courses') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'time-table') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('time-table')"> <img src="{{ asset('assets/img/gadwal.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.time table') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'quizes') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('quizes')"> <img src="{{ asset('assets/img/quiz.png') }}" alt=""> <span
                        class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.periodic exams') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'degrees') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('degrees')"> <img src="{{ asset('assets/img/dargat.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.grades') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'exams') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('exams')"> <img src="{{ asset('assets/img/a5tbarat.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.final exams') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'payments') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('payments')"> <img src="{{ asset('assets/img/madfo3at.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.payments') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'certificate') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('certificate')"> <img src="{{ asset('assets/img/shehadat.png') }}"
                        alt=""> <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.certifications') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'documents') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('documents')"> <img src="{{ asset('assets/img/malafat.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.courses files') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'reports') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('reports')"> <img src="{{ asset('assets/img/takareer.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.performance') }}</span></a>
            </li>
            <li @click="aside = !aside"
                class="@if ($tab == 'instructs') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('instructs')"> <img src="{{ asset('assets/img/ta3lemaat.png') }}"
                        alt=""> <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                        {{ __('messages.instructions') }}</span></a>
            </li>
        </ul>
    </aside>
    <div class=" sticky top-24 ">
        <aside class="   hidden lg:flex desktop-aside z-[99999999999] w-[240px] bg-white  flex-col justify-between">
            <ul class=" overflow-y-auto h-[63dvh] my-6 ">
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'dashboard') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('dashboard')"> <img src="{{ asset('assets/img/ta7akom.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.dashboard') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'courses' || $tab == 'course-details') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('courses')"> <img src="{{ asset('assets/img/dawart.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.courses') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'time-table') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('time-table')"> <img src="{{ asset('assets/img/gadwal.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.time table') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'quizes') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('quizes')"> <img src="{{ asset('assets/img/quiz.png') }}" alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.periodic exams') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'degrees') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('degrees')"> <img src="{{ asset('assets/img/dargat.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.grades') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'exams') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('exams')"> <img src="{{ asset('assets/img/a5tbarat.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.final exams') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'payments') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('payments')"> <img src="{{ asset('assets/img/madfo3at.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.payments') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'certificate') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('certificate')"> <img src="{{ asset('assets/img/shehadat.png') }}"
                            alt=""> <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.certifications') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'documents') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('documents')"> <img src="{{ asset('assets/img/malafat.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.courses files') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'reports') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('reports')"> <img src="{{ asset('assets/img/takareer.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.performance') }}</span></a>
                </li>
                <li
                    class=" cursor-pointer w-full  @if ($tab == 'instructs') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('instructs')"> <img src="{{ asset('assets/img/ta3lemaat.png') }}"
                            alt=""> <span class="text-center  text-lg font-normal cursor-pointer capitalize ">
                            {{ __('messages.instructions') }}</span></a>
                </li>
            </ul>
            <div class=" rounded-2xl bg-lightgray overflow-hidden she7ata h-32 mx-4 she7ata border">
                <div class="grid grid-cols-3 gap-2 p-2">
                    <div class=" col-span-2  divide-transparent flex justify-center flex-col gap-2  ">
                        <h2>اقساط مستحقة</h2>
                        <h5 class=" text-[13px]">برجاء سداد الأقساط المستحقة</h5>
                        <a href="" class=" text-primary flex gap-2 items-center font-semibold ">
                            <span>سدد الان</span>
                            <i class="fa-solid fa-chevron-right rtl:hidden"></i>
                            <i class="fa-solid fa-chevron-left ltr:hidden"></i>
                        </a>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </aside>
    </div>


</div>
