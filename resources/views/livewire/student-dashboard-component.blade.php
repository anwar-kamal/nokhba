<div class=" flex relative " x-data="{ aside: false }">

    @livewire('student-dashboard-sidebar-component')

    <main class=" bg-lightgray flex-grow md:px-10 md:py-6 p-2  overflow-hidden ">
        <div class="w-52 h-14 bg-white rounded-2xl shadow border border-neutral-200 cent gap-2 text-center text-red-800 text-lg font-normal  capitalize leading-[18px] lg:hidden mb-4"
            @click="aside=!aside">
            <i class="fa-solid fa-bars"></i>
            <span>{{ __('messages.dashboard nav') }}</span>
        </div>
        <div wire:loading>
            <x-loading-alert></x-loading-alert>
        </div>

        @if ($tab != 'dashboard')
            <div class="text-start">
                <span
                    class="text-red-800 text-lg font-semibold font-['Somar Sans'] capitalize leading-[18px] cursor-pointer"
                    wire:click="navigate('dashboard')">{{ __('messages.dashboard') }}
                </span>
                @if ($tab == 'course-details')
                    <span
                        class="text-red-800 text-lg font-semibold font-['Somar Sans'] capitalize leading-[18px]">>></span>
                    <span
                        class="text-red-800 text-lg font-semibold font-['Somar Sans'] capitalize leading-[18px] cursor-pointer"
                        wire:click="navigate('courses')">{{ __('messages.courses') }}</span>
                @endif
                <span class="text-neutral-800 text-2xl font-semibold font-['Somar Sans'] capitalize leading-normal">
                </span>
                <span
                    class="text-zinc-600 text-opacity-70 text-lg font-normal font-['Somar Sans'] capitalize leading-[18px]">>>
                    @switch($tab)
                        @case('courses')
                            {{ __('messages.courses') }}
                        @break

                        @case('course-details')
                            @if ($course_id)
                                @php
                                    $course = App\Models\Course::find($course_id);
                                @endphp

                                @if ($course->course_level->product->course_levels->count() > 1)
                                    {{ $course->course_level->product->name_ar }}(
                                    {{ $course->course_level->name }} )
                                @else
                                    {{ $course->course_level->product->name_ar }}
                                @endif
                            @endif
                        @break

                        @case('time-table')
                            {{ __('messages.weekly time table') }}
                        @break

                        @case('quizes')
                            {{ __('messages.periodic exams') }}
                        @break

                        @case('degrees')
                            {{ __('messages.grades') }}
                        @break

                        @case('exams')
                            {{ __('messages.final exams') }}
                        @break

                        @case('payments')
                            {{ __('messages.payments') }}
                        @break

                        @case('certificate')
                            {{ __('messages.certifications') }}
                        @break

                        @case('documents')
                            {{ __('messages.courses files') }}
                        @break

                        @case('reports')
                            {{ __('messages.performance') }}
                        @break

                        @case('instructs')
                            {{ __('messages.instructions') }}
                        @break

                        @default
                    @endswitch
                </span>
            </div>
        @endif
        @if ($tab == 'dashboard')
            @livewire('student-main-component')
        @elseif ($tab == 'courses')
            @livewire('student-courses-component')
        @elseif ($tab == 'course-details')
            @livewire('student-course-details-component', ['course_id' => $course_id])
        @elseif ($tab == 'time-table')
            @livewire('student-time-table-component')
        @elseif ($tab == 'quizes')
            @livewire('student-quizes-component')
        @elseif ($tab == 'degrees')
            @livewire('student-degrees-component')
        @elseif ($tab == 'exams')
            @livewire('student-exams-component')
        @elseif ($tab == 'payments')
            @livewire('student-payments-component')
        @elseif ($tab == 'certificate')
            @livewire('student-certificate-component')
        @elseif ($tab == 'documents')
            @livewire('student-documents-component')
        @elseif ($tab == 'reports')
            @livewire('student-reports-component')
        @elseif ($tab == 'instructs')
            @livewire('student-instructions-component')
        @endif
    </main>
</div>
