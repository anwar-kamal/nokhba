<div class=" py-6  gap-4 grid grid-auto-500">
    @forelse ($current_courses as $course)
        @php
            $cs = App\Services\CustomerService::course_course_customer($course->id)->first();
            $count_current_session = App\Services\CustomerService::passed_course_sessions($course->id)->count();
            $count_attendance = $cs->course_customer_attendances()->where('attend', 1)->count();
            $per = 0;
            if ($count_current_session) {
                $per = round(($count_attendance / $count_current_session) * 100, 2);
            }

            $course_queizes = App\Services\CustomerService::course_quizes_exam_ids($course->id);

            $passed_course_customer_exams = App\Services\CustomerService::passed_course_customer_exams($course->id)->count();

            $percentage = 0;
            if (count($course_queizes)) {
                $percentage = round(($passed_course_customer_exams / count($course_queizes)) * 100, 2);
            }

        @endphp
        @if ($cs)
            <div class=" p-5 bg-white rounded-2xl border grid gap-2 ">
                <h4 class=" text-center text-neutral-700 xl:text-lg font-semibold capitalize ">
                    {{ $course->name }}
                </h4>
                <div class=" grid grid-cols-2 gap-2">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('assets/img/attend.png') }}" alt="">
                        <p
                            class="text-center text-zinc-600 xl:text-sm text-xs font-normal font-['Somar Sans'] leading-[14px]">
                            {{ __('messages.attendance percentage') }}</p>
                    </div>
                    <div class="sm:grid hidden gap-2">
                        <div
                            class="text-center text-blue-600 xl:text-sm text-xs font-semibold font-['Somar Sans'] capitalize leading-[14px]">
                            {{ __('messages.attended') }} {{ $count_attendance }} {{ __('messages.out of') }}
                            {{ $count_current_session }} {{ __('messages.lecture') }}
                        </div>
                        @if ($per)
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700">
                                <div class="bg-blue-600 h-1.5 rounded-full dark:bg-blue-500"
                                    style="width: {{ $per }}%">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class=" max-sm:flex justify-end items-center hidden">
                        <div class="progress-bar"
                            style="  background:
                            radial-gradient(closest-side, white 70%, transparent 80% 100%),
                            conic-gradient(rgb(39, 104, 243) {{ $per }}%, rgb(221, 221, 221) 0);">
                            <div class=" text-xs font-semibold text-[#3469db]">
                                {{ $count_attendance }}/{{ $count_current_session }}</div>

                        </div>
                    </div>
                </div>
                <div class="sm:grid flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('assets/img/exams.png') }}" alt="">
                        <p
                            class="text-center text-zinc-600 xl:text-sm text-xs font-normal font-['Somar Sans'] leading-[14px]">
                            {{ __('messages.percentage of passing periodic exams') }}</p>
                    </div>
                    <div class="sm:grid hidden gap-2">
                        <div
                            class="text-center text-[#AC7AB5] xl:text-sm text-xs font-semibold font-['Somar Sans'] capitalize leading-[14px]">
                            {{ __('messages.passed') }} {{ $passed_course_customer_exams }} {{ __('messages.out of') }} {{count($course_queizes)}} {{ __('messages.Exam') }}
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700">
                            <div class="bg-[#AC7AB5] h-1.5 rounded-full dark:bg-blue-500" style="width: {{$percentage}}%">
                            </div>
                        </div>
                    </div>
                    <div class=" max-sm:flex justify-end items-center hidden">
                        <div class="progress-bar"
                            style="  background:
                            radial-gradient(closest-side, white 70%, transparent 80% 100%),
                            conic-gradient(#AC7AB5 {{$percentage}}%, rgb(221, 221, 221) 0);"
                            >
                            <div class=" text-xs font-semibold  text-[#b754c9]">{{ $passed_course_customer_exams }}/{{count($course_queizes)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @empty
            {{-- Anwar (no courses) --}}
    {{ __('messages.there are no performance reports yet') }}
    @endforelse
</div>
