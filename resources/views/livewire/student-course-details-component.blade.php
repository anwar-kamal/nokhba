<div x-data="{ sort: 'content' }">
    <div class=" grid lg:grid-cols-3 my-8 gap-8 content-start">
        @if (!$is_allowed_controller)
            <div class="lg:col-span-2 grid gap-8 self-start">
                <div class=" w-full aspect-video overflow-hidden rounded-2xl">
                    @if ($disallow_reason == 'exam')
                        <div>
                            {{-- Anwar --}}
                            {{ __('messages.sorry, you cannot view this content before solving the previous lecture tests') }}
                        </div>
                    @else
                        <div>
                            {{-- Anwar --}}
                            {{ __('messages.sorry, you cannot view this content at this time') }}
                            <br>
                            {{ __('messages.this content will be available') }}
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $active_session->session_date)->translatedFormat('l d M Y') }}
                        </div>
                    @endif
                </div>
            </div>
        @elseif (!$show_exam)
            <div class="lg:col-span-2 grid gap-8 self-start">

                <div class=" w-full aspect-video overflow-hidden rounded-2xl">

                    @if ($open_session)
                        @if ($active_session->type == 'live')
                            <!-- live  -->
                            @if ($active_session->status == 'completed' || $active_session->session_date < date('Y-m-d'))
                                @if ($active_session->internal_meeting_id && $this->is_recorder($active_session->id))
                                    @foreach (array_reverse(explode(',', $active_session->is_recorded)) as $key => $link)
                                        @if ($link)
                                            <iframe class="" width="100%" height="500px" src="{{ $link }}"
                                                title="YouTube video player" frameborder="0" style=" height: 500px; "
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        @endif
                                    @endforeach
                                @else
                                    <div>
                                        {{-- Anwar --}}
                                        {{ __('messages.the lecture recording is being processed, please come back later') }}
                                    </div>
                                @endif
                            @else
                                <div class="text-center my-4 d-block">
                                    {{-- Anwar --}}
                                    <button class=" btn btn-primary py-3 px-4 my-4 join-btn"
                                        wire:click="join({{ $active_session->id }})">{{ __('messages.start lecture') }}</button>
                                </div>
                            @endif
                            <!-- live -->
                        @else
                            <iframe class="" width="100%" height="500px"
                                src="{{ $active_session->is_recorded }}" title="YouTube video player" frameborder="0"
                                style=" height: 500px; "
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        @endif
                    @else
                            {{-- Anwar --}}
                        <button class="btn btn-danger mx-auto d-block py-2 px-4 my-5" wire:click="start()">
                            {{ __('messages.start lecture') }}</button>
                    @endif
                </div>
                <div
                    class=" bg-white rounded-2xl border border-neutral-200 p-8 flex flex-col justify-between gap-4  min-h-[400px] ">
                    <div>
                        <div class="flex items-center">
                            <button
                                class="text-center text-neutral-800 text-lg font-semibold  capitalize leading-[18px] "
                                @click="sort='content'" :class="sort === 'content' ? ' text-primary' : ''">
                                {{ __('messages.lecture content') }} </button>
                            <button
                                class="text-center text-neutral-800 text-lg font-semibold  capitalize leading-[18px] px-5"
                                @click="sort='files'" :class="sort === 'files' ? ' text-primary' : ''">
                                {{ __('messages.files') }}
                                ({{ $active_session->library_files->count() + $active_session->course->library_files->count() }})</button>
                        </div>
                        <div class=" h-0.5 opacity-60 bg-neutral-200 my-4"></div>
                    </div>
                    <div class="flex-grow ">
                        <div x-show=" sort==='content'">
                            {!! $active_session->description !!}
                        </div>
                        <div x-show=" sort==='files'">
                            <div class=" grid md:grid-cols-2 gap-8 lg:grid-cols-1 xl:grid-cols-2">
                                @foreach ($active_session->library_files as $file)
                                <x-file-card>
                                    <x-slot name="title">{{ $file->name }}</x-slot>
                                    <x-slot name="url">{{ $file->url }}</x-slot>
                                    <x-slot name="icon">
                                        @if ($file->library_file_type_id == 1)
                                            <img src="{{ asset('assets/img/img_icon.png') }}" alt="">
                                        @elseif($file->library_file_type_id == 2)
                                            <img src="{{ asset('assets/img/video_icon.png') }}" alt="">
                                        @elseif($file->library_file_type_id == 3)
                                            <img src="{{ asset('assets/img/book_icon.png') }}" alt="">
                                        @endif
                                    </x-slot>
                                    <x-slot
                                        name="type_name">{{ $file->library_file_type_id ? $file->library_file_type->name : '' }}</x-slot>
                                </x-file-card>
                                @endforeach
                                @foreach ($active_session->course->library_files as $file)
                                <x-file-card>
                                    <x-slot name="title">{{ $file->name }}</x-slot>
                                    <x-slot name="url">{{ $file->url }}</x-slot>
                                    <x-slot name="icon">
                                        @if ($file->library_file_type_id == 1)
                                            <img src="{{ asset('assets/img/img_icon.png') }}" alt="">
                                        @elseif($file->library_file_type_id == 2)
                                            <img src="{{ asset('assets/img/video_icon.png') }}" alt="">
                                        @elseif($file->library_file_type_id == 3)
                                            <img src="{{ asset('assets/img/book_icon.png') }}" alt="">
                                        @endif
                                    </x-slot>
                                    <x-slot
                                        name="type_name">{{ $file->library_file_type_id ? $file->library_file_type->name : '' }}</x-slot>
                                </x-file-card>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if ($token)
                <div class="">
                    {{-- Anwar --}}
                    <a target="_blank" class="btn " href="{{ env('APP_URL_OLD') . '/course_customer_exam/' . $token . '/exam/create' }}">
                        {{ __('messages.go to exam page') }}</a>
                </div>
            @else
                {{-- Anwar --}}
                <div class="">
                    {{ __('messages.you have done this exam before') }}
                </div>
                @php
                    $cs_exam = \App\Models\CourseCustomerExam::where('course_customer_id', '=', $cs_id)
                        ->where('course_exam_id', '=', $active_session->exam_id)
                        ->first();
                @endphp
                @if ($cs_exam->get_all_cc_exam_eval_query()->get()->count() < 3)
                    <div class="">
                        <div target="_blank" class="" wire:click="regenrate_session_exam({{ $cs_exam->id }})">
                            {{ __('messages.exam repetition') }} </div>
                    </div>
                @endif
            @endif
        @endif
        <div class="lg:col-span-1">
            <div class="  bg-white rounded-2xl p-8">
                @php
                    $prev = false;
                    $is_allowed = true;
                @endphp
                @foreach ($course->course_sessions()->where('status', '!=', 'canceled')->orderBy('session_date', 'asc')->get() as $course_session)
                    @php $is_allowed = $this->is_allowed($prev , $is_allowed ,$course_session); @endphp
                    <div class="grid gap-4">
                        <div class=" flex justify-between items-center">
                            <div class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start"
                                style=" @if ($course_session->id == $active_session->id) color: #9F1916; @endif ">
                                <span class="cursor-pointer"
                                    wire:click="change_session({{ $course_session->id }},false,{{ $is_allowed ? 'true' : 'false' }})">{{ $course_session->title }}</span>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/img/we7dat-date.png') }}" alt="">
                                    <div class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $course_session->session_date)->translatedFormat('d M Y') }}
                                    </div>
                                    @if ($course_session->exam)
                                        <div class=" cent gap-2 cursor-pointer"
                                            wire:click="change_session({{ $course_session->id }},'true', {{ $is_allowed ? 'true' : 'false' }})">
                                            <div class="text-zinc-600 text-sm font-normal ">
                                                |
                                            </div>
                                            <img src="{{ asset('assets/img/quiz.svg') }}" alt="" width="32"
                                                height="32">
                                            <span
                                                class="text-primary text-sm font-normal ">{{ __('messages.quiz') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if ($is_allowed && $course_session->is_attend($cs_id) == 1)
                                <img src="{{ asset('assets/img/task-complete.png') }}" width="32" height="32"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 my-4"></div>
                    @php $prev= $course_session; @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>


<script>
    var i;
    // open link in new tab ;
    window.addEventListener('redirect_to', event => {

        window.open(event.detail.url, '_blank');
    });

    // wait for moderatio open lecture
    window.addEventListener('wait_lecture', event => {

        jQuery('.join-btn').text(jQuery('.join-btn').text() + ' ... بانتظار المدرب');
        jQuery('.join-btn').attr('disabled', 'disabled');


        i = setTimeout(function() {
            // do your thing
            console.log('in timeout');
            Livewire.emit('join', event.detail.course_session_id);

        }, 5000);

    });

    window.addEventListener('go_top', event => {
        window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });    });
</script>
