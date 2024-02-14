<div class=" grid xl:grid-cols-3 md:grid-cols-2 gap-8">
    <div class="  col-span-2 grid md:grid-cols-2  gap-8 content-start">

        <x-icon-card>
            <x-slot name="title">{{ $data['current'] }}</x-slot>
            <x-slot name="icon">{{ asset('assets/img/dawrat-7alia.png') }}</x-slot>
            {{ __('messages.current courses') }}
        </x-icon-card>
        <x-icon-card>
            <x-slot name="title">{{ $data['completed'] }}</x-slot>
            <x-slot name="icon">{{ asset('assets/img/dawart-moktamla.png') }}</x-slot>
            {{ __('messages.completed courses') }}
        </x-icon-card>
        <x-icon-card>
            <x-slot name="title">{{ $data['exams'] }}</x-slot>
            <x-slot name="icon">{{ asset('assets/img/a5tbart-moktamela.png') }}</x-slot>
            {{ __('messages.completed exams') }}
        </x-icon-card>
        <x-icon-card>
            <x-slot name="title">{{ $data['certs'] }}</x-slot>
            <x-slot name="icon">{{ asset('assets/img/shehadat-moktmla.png') }}</x-slot>
            {{ __('messages.certifications') }}
        </x-icon-card>

        {{-- current courses --}}
        <div class=" md:col-span-2  flex justify-between items-center -mb-4 ">
            <div class=" text-neutral-800 text-lg font-semibold  capitalize leading-[18px] ">
                {{ __('messages.current courses') }}</div>
            <button wire:click="navigate('courses')" class="cent gap-2 text-primary text-sm">
                <div class="text-center   font-semibold  capitalize ">
                    {{ __('messages.view more') }}</div>
                <div>
                    <i class="fa-solid fa-chevron-left ltr:hidden"></i>
                    <i class="fa-solid fa-chevron-right rtl:hidden"></i>
                </div>
            </button>
        </div>
        @forelse ($current_courses as $course)
            @php
                $product = $course->course_level ? $course->course_level->product : '';
                $course_customer = App\Services\CustomerService::course_course_customer($course->id)->first();
                $semester_name = App\Services\CustomerService::course_semester($course->id)->name;
                if ($course_customer && $course_customer->confirmation == 'Rejected') {
                    continue;
                }

                if ($product && $product->image_ar) {
                    if (App::getLocale() == 'ar') {
                        $image = env('APP_URL_ERP') . '/storage/' . $product->image_ar;
                    } else {
                        $image = env('APP_URL_ERP') . '/storage/' . $product->image_en;
                    }
                } else {
                    $image = asset('assets/img/course-img.png');
                }

                if (App::getLocale() == 'ar') {
                    $product_name = $product->name_ar;
                } else {
                    $product_name = $product->name_en;
                }

                $count_current_session = $course->course_sessions()->where('status', '!=', 'canceled')->where('session_date', '<=', date('Y-m-d'))->count();
                $count_attendance = $course_customer->course_customer_attendances()->where('attend', 1)->count();
                if ($count_current_session && $count_current_session > 0) {
                    $per = round(($count_attendance / $count_current_session) * 100, 2);
                } else {
                    $per = 0;
                }
            @endphp
            <x-image-card>
                <x-slot name="image">
                    {{ $image }}
                </x-slot>
                <x-slot name="badge">{{ $semester_name }}</x-slot>
                <x-slot name="title"> {{ $product_name }}</x-slot>
                <x-slot name="percentage">{{ $per }}</x-slot>
                <x-slot name="link">course-details</x-slot>
                <x-slot name="link_id">{{$course->id}}</x-slot>
                <x-slot name="link_title">{{ __('messages.complete course') }}</x-slot>
            </x-image-card>
        @empty
            {{-- no courses --}}
        @endforelse

        {{-- final exams --}}
        <div class=" md:col-span-2  flex justify-between items-center -mb-4 mt-4">
            <div class=" text-neutral-800 text-lg font-semibold  capitalize leading-[18px]">
                {{ __('messages.final exams') }}</div>
            <button wire:click="navigate('exams')" class="cent gap-2 text-primary text-sm">
                <div class="text-center   font-semibold  capitalize ">
                    {{ __('messages.view more') }}</div>
                <div>
                    <i class="fa-solid fa-chevron-left ltr:hidden"></i>
                    <i class="fa-solid fa-chevron-right rtl:hidden"></i>
                </div>
            </button>
        </div>
        @if (!empty($final_exams))
            <x-table>
                <x-slot name="head">
                    <tr>
                        <x-th class="px-4 py-2" scope="col">
                            {{ __('messages.exam name') }}
                        </x-th>
                        <x-th class="px-4 py-2" scope="col">
                            {{ __('messages.date') }}
                        </x-th>
                        <x-th class="px-4 py-2" scope="col">
                        </x-th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach (array_slice($final_exams, 0, 4) as $course_have_exam)
                        @php
                            $exam = App\Models\CourseCustomerExam::find($course_have_exam['exam_id']);
                        @endphp

                        <x-tr>
                            <x-th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center">
                                <img src="{{ asset('assets/img/table-image.png') }}" alt="" width="50"
                                    height="50" class=" rounded-lg">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                    {{ $course_have_exam['course_name'] }}
                                </div>
                            </x-th>
                            <x-td>
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
                            </x-td>
                            <x-td>
                                @php
                                    $course_queizes = App\Services\CustomerService::course_quizes_exam_ids($course->id);
                                    $courseCustomer = $exam->course_customer;

                                    $course_customer_exam = $courseCustomer ? $courseCustomer->course_customer_exams()->whereNotNull('token')->whereNotIn('course_exam_id', $course_queizes)->first() : false;
                                @endphp
                                @if ($course_customer_exam && Carbon\Carbon::parse($course_customer_exam->from)->format('Y-m-d') <= date('Y-m-d'))
                                    <a class="w-full py-3 px-4 min-w-52 bg-white rounded-xl border border-primary justify-center items-center gap-1.5 inline-flex disabled:border-zinc-400 disabled:text-zinc-400 text-primary"
                                        href="{{ env('APP_URL_OLD') . '/course_customer_exam/' . $course_customer_exam->token . '/exam/create' }}"
                                        target="__blank">
                                        <div class="text-center  text-sm font-semibold capitalize ">
                                            {{ __('messages.available exam now') }}</div>
                                    </a>
                                @else
                                    <button disabled
                                        class="w-full py-3 px-4 min-w-52 bg-white rounded-xl border border-primary justify-center items-center gap-1.5 inline-flex disabled:border-zinc-400 disabled:text-zinc-400 text-primary"
                                        href="#">
                                        <div class="text-center  text-sm font-semibold capitalize ">
                                            {{ __('messages.available exam now') }}</div>
                                    </button>
                                @endif

                            </x-td>
                        </x-tr>
                    @endforeach
                </x-slot>
            </x-table>

            {{-- final exams responsive --}}
            <div class=" md:col-span-2 overflow-y-auto max-h-[600px] max-sm:grid hidden  gap-4 ">
                @foreach (array_slice($final_exams, 0, 4) as $course_have_exam)
                    @php
                        $exam = App\Models\CourseCustomerExam::find($course_have_exam['exam_id']);
                    @endphp
                    <x-responsive-basic-row>
                        <x-slot name="title">{{ $course_have_exam['course_name'] }}</x-slot>
                        <x-slot name="content">
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
                        </x-slot>
                        @php
                            $courseCustomer = $exam ? $exam->course_customer : null;
                            $course_queizes = $courseCustomer ? App\Services\CustomerService::course_quizes_exam_ids($courseCustomer->course_id) :[];

                            $course_customer_exam = $courseCustomer ? $courseCustomer->course_customer_exams()->whereNotNull('token')->whereNotIn('course_exam_id', $course_queizes)->first() : null;
                        @endphp
                        @if ($course_customer_exam && Carbon\Carbon::parse($course_customer_exam->from)->format('Y-m-d') <= date('Y-m-d'))
                            <x-slot
                                name="link">{{ env('APP_URL_OLD') . '/course_customer_exam/' . $course_customer_exam->token . '/exam/create' }}</x-slot>
                        @endif
                    </x-responsive-basic-row>
                @endforeach
            </div>
        @else
            {{-- no exams --}}
        @endif
    </div>

    <div class=" xl:col-span-1 col-span-2 grid  gap-16 ">
        {{-- day sessions --}}
        <div class="  max-h-[700px] rounded-2xl border border-neutral-200 p-4 bg-white grid gap-4  overflow-hidden">
            <x-calender>
                <x-slot name="model">session_date</x-slot>
            </x-calender>
            <div class=" h-0.5 opacity-50 bg-neutral-200 rounded-[100px] hidden sm:block lg:block xl:hidden 2xl:block">
            </div>
            <div class=" text-neutral-800 text-lg font-semibold  capitalize ">
                {{ __("messages.Today's lectures") }} </div>
            <div class=" overflow-y-auto grid gap-4 p-1">
                @forelse (App\Services\CustomerService::day_sessions($session_date) as $course_session)
                    <div class="  bg-gray-50 rounded-2xl border border-neutral-200  flex items-center gap-4 p-2">
                        <img src="{{ asset('assets/img/table-image.png') }}" alt=""
                            class=" rounded-lg w-[80px]   ">
                        <div class=" grid gap-4">
                            <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                {{ $course_session->course_id ? $course_session->course->name : '' }}
                            </div>
                            <div class="flex gap-1 items-center">
                                <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                <span class="text-zinc-600 text-sm font-normal ">
                                    @if (App::getLocale() == 'ar')
                                        <span>{{ date_format(date_create($course_session->from), 'g:i') . ($date_to->format('A') == 'AM' ? 'ص' : 'م') }}</span>
                                        - <span>{{ date_format(date_create($course_session->to), 'g:i') . ($date_to->format('A') == 'AM' ? 'ص' : 'م') }}</span>
                                    @else
                                        <span>{{ date_format(date_create($course_session->from), 'g:i') . $date_to->format('A') }}</span>
                                        - <span>{{ date_format(date_create($course_session->to), 'g:i') . $date_to->format('A') }}</span>
                                    @endif

                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- no sessions --}}
                @endforelse
            </div>
        </div>

        {{-- quizes --}}
        <div class="grid gap-4">
            <div class=" w-full  flex justify-between items-center">
                <div class=" text-neutral-800 text-lg font-semibold  capitalize leading-[18px]">
                    {{ __('messages.periodic exams') }} </div>
                <button wire:click="navigate('quizes')" class="cent gap-2 text-primary text-sm">
                    <div class="text-center   font-semibold  capitalize ">
                        {{ __('messages.view more') }}</div>
                    <div>
                        <i class="fa-solid fa-chevron-left ltr:hidden"></i>
                        <i class="fa-solid fa-chevron-right rtl:hidden"></i>
                    </div>
                </button>
            </div>
            <div class="  p-1  h-[700px] overflow-y-auto  grid gap-4  content-start overflow-hidden ">
                @forelse (App\Services\CustomerService::quizes()->take(2) as $quiz)
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
                        <x-slot name="badge">{{ $quiz->session_date }}</x-slot>
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
                    {{-- no quizes --}}
                @endforelse
            </div>
        </div>
    </div>
</div>
