<div class="">
    <div class=" md:flex justify-end items-center">
        <div x-data="{ sort: '{{ __('messages.course') }}', course: false }" class="relative">
            <div class="px-4 py-2 gap-4 bg-white rounded-2xl border border-neutral-200 justify-between items-center inline-flex cursor-pointer"
                @click="course =!course" @click.away="course = false">
                <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                    <span x-text="sort"></span>
                </div>
                <div>
                    <div x-show="!course">
                        <i class="fa-solid fa-chevron-down "></i>
                    </div>
                    <div class="hidden" x-show="course" :class="course ? ' !block ' : ''"><i
                            class="fa-solid fa-chevron-up "></i>
                    </div>
                </div>
            </div>
            <ul class=" absolute hidden top-11 rtl:left-0 ltr:right-0 max-w-64 min-w-40  z-30 bg-white border rounded-xl drop-shadow-md  text-zinc-900  tracking-wider  sm:gap-1"
                @click="course = !course" :class="course ? '!grid' : ''" x-show="course">
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer   sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                    wire:click="select_course({{null }})"
                    @click="sort='{{ __('messages.all') }}'; course = !course"
                    :class="sort === 'empty' ? 'bg-red-50 text-red-900' : ''">
                    {{ __('messages.all') }}</li>

                @foreach ($current_courses as $course)
                    <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer   sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                        wire:click="select_course({{ $course->id }})"
                        @click="sort='{{ $course->name }}'; course = !course"
                        :class="sort === 'empty' ? 'bg-red-50 text-red-900' : ''">
                        {{ $course->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class=" flex md:justify-end justify-evenly md:gap-4 gap-2 ">

    </div>

    <div class=" grid 2xl:grid-cols-3 md:grid-cols-2 gap-4 py-8">
        @forelse ($quizes as $quiz)
            @php
                $cs = App\Services\CustomerService::course_course_customer($quiz->course_id)->first();
                if ($cs) {
                    $taken_quiz = App\Models\CourseCustomerExam::where('course_customer_id', '=', $cs->id)
                        ->where('course_exam_id', '=', $quiz->exam_id)
                        ->whereNull('token')
                        ->whereNotNull('total_score')
                        ->first();
                }
            @endphp
            <x-text-card>
                <x-slot name="badge_icon">{{ asset('assets/img/date_blue.png') }}</x-slot>
                <x-slot
                    name="badge">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $quiz->session_date)->translatedFormat('d M Y') }}</x-slot>
                <x-slot name="title">
                    @if ($quiz->exam_id && $quiz->exam->exam_id)
                        {{ $quiz->exam->exam->name }}
                    @endif
                </x-slot>
                @if ($quiz->session_date <= date('Y-m-d') && !$taken_quiz && $cs)
                    <x-slot name="link">{{ App\Services\CustomerService::enter_exam($quiz->id, $cs->id) }}</x-slot>
                @endif
                <x-slot name="link_title">{{ __('messages.start exam') }}</x-slot>
            </x-text-card>
        @empty
            {{-- Anwar (no quizes) --}}
            {{ __('messages.there are no periodic exams') }}
        @endforelse
    </div>
</div>
