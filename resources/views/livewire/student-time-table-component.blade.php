<div x-data="{ sort: 'study' }" class="grid gap-8 relative">
    <div class=" overflow-hidden w-full">
        <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap">
            <ul
                class="  p-1 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider cent gap-2 font-semibold my-2 w-fit  whitespace-nowrap  ">
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                    @click="sort='study'" :class="sort === 'study' ? 'bg-red-50 text-red-900' : ''">
                    {{ __('messages.weekly time table') }}</li>
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                    @click="sort='weekly'" :class="sort === 'weekly' ? 'bg-red-50 text-red-900' : ''">
                    {{ __('messages.schedule of weekly periodic exams') }}</li>
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                    @click="sort='semi_final'" :class="sort === 'semi_final' ? 'bg-red-50 text-red-900' : ''">
                    {{ __('messages.schedule of periodic exams') }}</li>
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                    @click="sort='final'" :class="sort === 'final' ? 'bg-red-50 text-red-900' : ''">
                    {{ __('messages.schedule of final exams') }}</li>
            </ul>
        </div>
    </div>
    <div x-show=" sort==='study'">
        <x-table>
            <x-slot name="head">
                <tr>
                    <x-th class="px-4 py-2" scope="col">
                    </x-th>
                    @foreach ($current_courses as $course)
                        <x-th class="px-4 py-2" scope="col">
                            {{ $course->name }}
                        </x-th>
                    @endforeach
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($days as $day)
                    <x-tr>
                        <x-th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                {{ $day }}
                            </div>
                            @php
                                $currentIndex = 0;
                            @endphp
                        </x-th>
                        @foreach ($current_courses as $course)
                            <x-td>
                                @php
                                    $currentDate = \Carbon\Carbon::now();
                                    // $currentDate = \Carbon\Carbon::parse($course->start_date);
                                    $startOfWeek = $currentDate->startOfWeek(\Carbon\Carbon::SATURDAY)->format('Y-m-d');
                                    $endOfWeek = $currentDate->endOfWeek(\Carbon\Carbon::FRIDAY)->format('Y-m-d');
                                @endphp
                                @foreach ($course->course_sessions()->whereBetween('session_date', [$startOfWeek, $endOfWeek])->whereNotIn('status', ['canceled'])->get() as $course_session)
                                    @if (\Carbon\Carbon::createFromDate($course_session->session_date)->translatedFormat('l') == $day)
                                        <div
                                            class=" p-2  w-full h-full rounded-2xl bg-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-50 border-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-400 border-2 ">
                                            <div
                                                class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                                {{ __('messages.lecture') }}</div>
                                            <div class="flex gap-1 items-center ">
                                                <span><img src="{{ asset('assets/img/time.png') }}"
                                                        alt=""></span>
                                                <span class="text-zinc-600 text-sm font-normal leading-7">
                                                    @if (App::getLocale() == 'ar')
                                                        <span>{{ date_format(date_create($course_session->from), 'g:i') . (date_format(date_create($course_session->from), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                        -
                                                        <span>{{ date_format(date_create($course_session->to), 'g:i') . (date_format(date_create($course_session->to), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                    @else
                                                        <span>{{ date_format(date_create($course_session->from), 'g:i') . date_format(date_create($course_session->from), 'A') }}</span>
                                                        -
                                                        <span>{{ date_format(date_create($course_session->to), 'g:i') . date_format(date_create($course_session->to), 'A') }}</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @php
                                    $currentIndex++;
                                    if ($currentIndex >= count($colors)) {
                                        $currentIndex = $currentIndex % count($colors);
                                    }
                                @endphp
                            </x-td>
                        @endforeach
                    </x-tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>

    <div x-show=" sort==='weekly'">
        <x-table>
            <x-slot name="head">
                <tr>
                    <x-th class="px-4 py-2" scope="col">
                    </x-th>
                    @foreach ($current_courses as $course)
                        <x-th class="px-4 py-2" scope="col">
                            {{ $course->name }}
                        </x-th>
                    @endforeach
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($days as $day)
                    <x-tr>
                        <x-th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                {{ $day }}
                            </div>
                            @php
                                $currentIndex = 0;
                            @endphp
                        </x-th>
                        @foreach ($current_courses as $course)
                            <x-td>
                                @php
                                    $currentDate = \Carbon\Carbon::now();
                                    // $currentDate = \Carbon\Carbon::parse($course->start_date);
                                    $startOfWeek = $currentDate->startOfWeek(\Carbon\Carbon::SATURDAY)->format('Y-m-d');
                                    $endOfWeek = $currentDate->endOfWeek(\Carbon\Carbon::FRIDAY)->format('Y-m-d');
                                    $course_quizes = App\Services\CustomerService::quizes()
                                        ->where('course_id', $course->id)
                                        ->whereBetween('session_date', [$startOfWeek, $endOfWeek])
                                        ->get();
                                @endphp
                                @foreach ($course_quizes as $course_quiz)
                                    @if (\Carbon\Carbon::createFromDate($course_quiz->session_date)->translatedFormat('l') == $day)
                                        <div
                                            class=" p-2  w-full h-full rounded-2xl bg-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-50 border-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-400 border-2 ">
                                            <div
                                                class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                                {{ __('messages.periodic exam') }}</div>
                                            <div class="flex gap-1 items-center ">
                                                <span><img src="{{ asset('assets/img/time.png') }}"
                                                        alt=""></span>
                                                <span class="text-zinc-600 text-sm font-normal leading-7">
                                                    @if (App::getLocale() == 'ar')
                                                        <span>{{ date_format(date_create($course_quiz->from), 'g:i') . (date_format(date_create($course_quiz->from), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                        -
                                                        <span>{{ date_format(date_create($course_quiz->to), 'g:i') . (date_format(date_create($course_quiz->to), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                    @else
                                                        <span>{{ date_format(date_create($course_quiz->from), 'g:i') . date_format(date_create($course_quiz->from), 'A') }}</span>
                                                        -
                                                        <span>{{ date_format(date_create($course_quiz->to), 'g:i') . date_format(date_create($course_quiz->to), 'A') }}</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @php
                                    $currentIndex++;
                                    if ($currentIndex >= count($colors)) {
                                        $currentIndex = $currentIndex % count($colors);
                                    }
                                @endphp
                            </x-td>
                        @endforeach
                    </x-tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div x-show=" sort==='semi_final'">
        <x-table>
            <x-slot name="head">
                <tr>
                    <x-th class="px-4 py-2" scope="col">
                    </x-th>
                    @foreach ($current_courses as $course)
                        <x-th class="px-4 py-2" scope="col">
                            {{ $course->name }}
                        </x-th>
                    @endforeach
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($months as $month => $month_name)
                    <x-tr>
                        <x-th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                {{ __('messages.' . $month_name) }}
                            </div>
                            @php
                                $currentIndex = 0;
                            @endphp
                        </x-th>
                        @foreach ($current_courses as $course)
                            <x-td>
                                @php
                                    $course_quizes = App\Services\CustomerService::quizes()
                                        ->where('course_id', $course->id)
                                        ->whereMonth('session_date', $month)
                                        ->get();
                                @endphp
                                @foreach ($course_quizes as $course_quiz)
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-50 border-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            {{ __('messages.periodic exam') }}</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">
                                                @if (App::getLocale() == 'ar')
                                                    <span>{{ date_format(date_create($course_quiz->from), 'g:i') . (date_format(date_create($course_quiz->from), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                    -
                                                    <span>{{ date_format(date_create($course_quiz->to), 'g:i') . (date_format(date_create($course_quiz->to), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                @else
                                                    <span>{{ date_format(date_create($course_quiz->from), 'g:i') . date_format(date_create($course_quiz->from), 'A') }}</span>
                                                    -
                                                    <span>{{ date_format(date_create($course_quiz->to), 'g:i') . date_format(date_create($course_quiz->to), 'A') }}</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                                @php
                                    $currentIndex++;
                                    if ($currentIndex >= count($colors)) {
                                        $currentIndex = $currentIndex % count($colors);
                                    }
                                @endphp
                            </x-td>
                        @endforeach
                    </x-tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div x-show=" sort==='final'">
        @if (!empty($final_exams))
            <x-table>
                <x-slot name="head">
                    <tr>
                        <x-th class="px-4 py-2" scope="col">
                        </x-th>
                        @foreach ($current_courses as $course)
                            <x-th class="px-4 py-2" scope="col">
                                {{ $course->name }}
                            </x-th>
                        @endforeach
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($final_exams as $course_have_exam)
                        @php
                            $exam = App\Models\CourseCustomerExam::find($course_have_exam['exam_id']);
                        @endphp
                        <x-tr>
                            <x-th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                    @if ($exam)
                                        @php
                                            $exam_duration = $exam->course_exam_id ? ($exam->course_exam->exam_id ? $exam->course_exam->exam->time_per_min : '') : '';
                                            if ($exam_duration) {
                                                $added = '+' . $exam_duration . ' minute';
                                                $end_time = date('Y-m-d H:i:s', strtotime($added, strtotime($exam->from)));
                                            }

                                            $date_from = Carbon\Carbon::parse($exam->from);
                                            $date_to = Carbon\Carbon::parse($exam->to);
                                        @endphp
                                        @if (isset($date_from) && $date_from)
                                            {{ $date_from->format('Y-m-d') }}
                                        @endif
                                    @endif
                                </div>
                                @php
                                    $currentIndex = 0;
                                @endphp
                            </x-th>
                            <x-td>
                                <div
                                    class=" p-2  w-full h-full rounded-2xl bg-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-50 border-{{ isset($colors[$currentIndex]) ? $colors[$currentIndex] : '' }}-400 border-2 ">
                                    <div class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                        {{ __('messages.final exam') }}</div>
                                    <div class="flex gap-1 items-center ">
                                        <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                        <span class="text-zinc-600 text-sm font-normal leading-7">
                                            @if ($exam && isset($date_from) && $date_from)
                                                @if (App::getLocale() == 'ar')
                                                    <span>{{ date_format(date_create($date_from), 'g:i') . (date_format(date_create($date_from), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                    -
                                                    <span>{{ date_format(date_create($date_to), 'g:i') . (date_format(date_create($date_to), 'A') == 'AM' ? 'ص' : 'م') }}</span>
                                                @else
                                                    <span>{{ date_format(date_create($date_from), 'g:i') . date_format(date_create($date_from), 'A') }}</span>
                                                    -
                                                    <span>{{ date_format(date_create($date_to), 'g:i') . date_format(date_create($date_to), 'A') }}</span>
                                                @endif
                                                {{-- متاح من <span class="font-weight-bold">{{ $date_from->format('h:i') }}
                                                    {{ $date_from->format('A') == 'AM' ? 'صباحا' : 'مساءا' }}
                                                </span> حتى <span
                                                    class="font-weight-bold">{{ $date_to->format('h:i') }}
                                                    {{ $date_to->format('A') == 'AM' ? 'صباحا' : 'مساءا' }}
                                                </span> --}}
                                            @else
                                                {{ __('messages.unavailable') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @php
                                    $currentIndex++;
                                    if ($currentIndex >= count($colors)) {
                                        $currentIndex = $currentIndex % count($colors);
                                    }
                                @endphp
                            </x-td>
                        </x-tr>
                    @endforeach
                </x-slot>
            </x-table>
        @else
            {{-- Anwar (no exams) --}}
            {{ __('messages.there are no final exams yet') }}
        @endif
    </div>
    <div x-show=" sort==='study'">
        <div class=" text-neutral-700 text-lg font-bold capitalize leading-[70px] mt-4">
            {{ __('messages.subjects') }}
        </div>
        <div class=" grid gap-4 ">
            @forelse ($current_courses as $course)
                <div
                    class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/img/table-image.png') }}" alt=""
                            class=" rounded-lg w-[80px]   ">
                        <div class=" grid gap-4">
                            <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                {{$course->name}}
                            </div>
                        </div>
                    </div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                    </div>
                    <div class="flex items-center justify-around gap-4">
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                {{ __('messages.start date') }}</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                {{ $course->start_date }}                            </div>
                        </div>
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                {{ __('messages.end date') }}</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                {{ $course->end_date }}                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Anwar (no courses) --}}
                {{ __('messages.there are no subjects yet') }}
            @endforelse
        </div>
    </div>
    <div x-show=" sort==='final'">
        <div class=" text-neutral-700 text-lg font-bold capitalize leading-[70px] mt-4">
            نظام الاختبار
        </div>
        @if (!empty($final_exams))
            <div class=" h-[229px] bg-white rounded-2xl border border-neutral-200">
                <div class="text-start text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[27px] p-4">
                    يتم
                    تطبيق اختبارات الفترة التدريبية لبرامج التأهيل و الدبلوم الواردة فى دليل
                    تعليمات التدريب التابع
                    للمؤسسة العامة للتدريب التقنى و المهنى<br />1. الدرجة النهائية لكل مادة 100
                    درجة<br />2. درجة
                    الاختبار 50 درجة<br />3.علامة النجاح هى 60%<br />4. تجري الاختبارات النهائية
                    فى
                    أسبوع الاختبارات
                    لكل ربع دراسى حسب التقويم الأكاديمى الرسمى الصادر من المؤسسة العامة للتدريب
                    التقنى و
                    المهنى<br />5. لا يسمح بدخول الاختبارات النهائية لمن عليها أى رسوم مالية
                    مستحقة<br />6. عند
                    الغياب عن اليوم المحدد للاختبارات بدون عذر مقبول تعتبر المتدربة راسبة و
                    عليها
                    إعادة تسجيل المادة
                </div>
            </div>
        @else
            {{-- Anwar (no exams) --}}
            {{ __('messages.there are no final exams yet') }}
        @endif
    </div>
</div>
