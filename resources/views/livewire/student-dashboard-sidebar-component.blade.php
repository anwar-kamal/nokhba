<div class="">
    <aside class=" inset-0 absolute lg:hidden top-0  bg-white text-white  z-50 " x-show="aside">
        <ul class=" overflow-y-auto   sticky top-0 py-6">
            <li class="@if ($tab == 'dashboard') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('dashboard')"> <img src="{{ asset('assets/img/ta7akom.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.dashboard') }}</span></a>
            </li>
            <li class="@if ($tab == 'courses' || $tab == 'course-details') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('courses')"> <img src="{{ asset('assets/img/dawart.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.courses') }}</span></a>
            </li>
            <li class="@if ($tab == 'time-table') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('time-table')"> <img src="{{ asset('assets/img/gadwal.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.time table') }}</span></a>
            </li>
            <li class="@if ($tab == 'quizes') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('quizes')"> <img src="{{ asset('assets/img/quiz.png') }}" alt=""> <span
                        class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.periodic exams') }}</span></a>
            </li>
            <li class="@if ($tab == 'degrees') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('degrees')"> <img src="{{ asset('assets/img/dargat.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.grades') }}</span></a>
            </li>
            <li class="@if ($tab == 'exams') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('exams')"> <img src="{{ asset('assets/img/a5tbarat.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.final exams') }}</span></a>
            </li>
            <li class="@if ($tab == 'payments') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('payments')"> <img src="{{ asset('assets/img/madfo3at.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.payments') }}</span></a>
            </li>
            <li class="@if ($tab == 'certificate') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('certificate')"> <img src="{{ asset('assets/img/shehadat.png') }}"
                        alt=""> <span
                        class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.certifications') }}</span></a>
            </li>
            <li class="@if ($tab == 'documents') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('documents')"> <img src="{{ asset('assets/img/malafat.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.courses files') }}</span></a>
            </li>
            <li class="@if ($tab == 'reports') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('reports')"> <img src="{{ asset('assets/img/takareer.png') }}" alt="">
                    <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.performance') }}</span></a>
            </li>
            <li class="@if ($tab == 'instructs') dash-nav-active @else dash-nav-inactive @endif text-white">
                <a wire:click="navigate('instructs')"> <img src="{{ asset('assets/img/ta3lemaat.png') }}"
                        alt=""> <span
                        class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                        {{ __('messages.instructions') }}</span></a>
            </li>
        </ul>
    </aside>

    <div class=" hidden lg:block">
        <aside class=" w-64 sticky top-0  bg-white text-white  z-50 ">
            <ul class=" overflow-y-auto   sticky top-0 py-6">
                <li
                    class="@if ($tab == 'dashboard') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('dashboard')"> <img src="{{ asset('assets/img/ta7akom.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.dashboard') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'courses' || $tab == 'course-details') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('courses')"> <img src="{{ asset('assets/img/dawart.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.courses') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'time-table') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('time-table')"> <img src="{{ asset('assets/img/gadwal.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.time table') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'quizes') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('quizes')"> <img src="{{ asset('assets/img/quiz.png') }}" alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.periodic exams') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'degrees') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('degrees')"> <img src="{{ asset('assets/img/dargat.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.grades') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'exams') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('exams')"> <img src="{{ asset('assets/img/a5tbarat.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.final exams') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'payments') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('payments')"> <img src="{{ asset('assets/img/madfo3at.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.payments') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'certificate') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('certificate')"> <img src="{{ asset('assets/img/shehadat.png') }}"
                            alt=""> <span
                            class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.certifications') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'documents') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('documents')"> <img src="{{ asset('assets/img/malafat.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.courses files') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'reports') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('reports')"> <img src="{{ asset('assets/img/takareer.png') }}"
                            alt="">
                        <span class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.performance') }}</span></a>
                </li>
                <li
                    class="@if ($tab == 'instructs') dash-nav-active @else dash-nav-inactive @endif text-white">
                    <a wire:click="navigate('instructs')"> <img src="{{ asset('assets/img/ta3lemaat.png') }}"
                            alt=""> <span
                            class="text-center  text-lg font-normal cursor-pointer capitalize leading-[18px]">
                            {{ __('messages.instructions') }}</span></a>
                </li>
            </ul>
        </aside>
    </div>

</div>
