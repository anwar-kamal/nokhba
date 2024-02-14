<div class="">
    <div class=" md:flex justify-end items-center">
        <x-choose>
            <x-slot name="label">{{ __('messages.course') }}</x-slot>
            <x-slot name="id">course</x-slot>
            <x-choose-list>
                <x-slot name="label">{{ __('messages.all') }}</x-slot>
                <x-slot name="func">select_course({{ null }})</x-slot>
                @if ($courseId == null)
                    <x-slot name="selected">
                        selected
                    </x-slot>
                @endif
            </x-choose-list>
            @foreach ($current_courses as $course)
                <x-choose-list>
                    <x-slot name="label">{{ $course->name }}</x-slot>
                    <x-slot name="func">select_course({{ $course->id }})</x-slot>
                    @if ($courseId == $course->id)
                        <x-slot name="selected">
                            selected
                        </x-slot>
                    @endif
                </x-choose-list>
            @endforeach
        </x-choose>
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
