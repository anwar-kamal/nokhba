<div x-data="{ sort: 'content' }">
    <div class=" grid lg:grid-cols-3 my-8 gap-8">
        <div class="lg:col-span-2 grid gap-8">
            @if (!$is_allowed_controller)
                <div class=" w-full aspect-video overflow-hidden rounded-2xl">
                    @if ($disallow_reason == 'exam')
                        <div>
                            {{ __('messages.sorry, you cannot view this content before solving the previous lecture tests') }}
                        </div>
                    @else
                        <div>
                            {{ __('messages.sorry, you cannot view this content at this time') }}
                            <br>
                            {{ __('messages.this content will be available') }}
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $active_session->session_date)->translatedFormat('l d M Y') }}
                        </div>
                    @endif
                </div>
            @elseif (!$show_exam)
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
                                        {{ __('messages.the lecture recording is being processed, please come back later') }}
                                    </div>
                                @endif
                            @else
                                <div class="text-center my-4 d-block">
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
                                    <div
                                        class="bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
                                        <div class="cent gap-2">
                                            @if ($file->library_file_type_id == 1)
                                                <img src="{{ asset('assets/img/img_icon.png') }}" alt="">
                                            @elseif($file->library_file_type_id == 2)
                                                <img src="{{ asset('assets/img/video_icon.png') }}" alt="">
                                            @elseif($file->library_file_type_id == 3)
                                                <img src="{{ asset('assets/img/book_icon.png') }}" alt="">
                                            @endif
                                            <div
                                                class="text-center text-neutral-800 text-sm font-semibold font-['Somar Sans'] capitalize leading-[14px]">
                                                {{ $file->name }}
                                            </div>
                                        </div>
                                        <a href="{{ env('APP_URL_ERP') . '/storage/' . $file->url }}"
                                            download="your-file-name" target="_blank">
                                            <i class="fa-solid fa-download text-primary fa-lg "></i>
                                        </a>
                                    </div>
                                @endforeach
                                @foreach ($active_session->course->library_files as $file)
                                    <div
                                        class="bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
                                        <div class="cent gap-2">
                                            @if ($file->library_file_type_id == 1)
                                                <img src="{{ asset('assets/img/img_icon.png') }}" alt="">
                                            @elseif($file->library_file_type_id == 2)
                                                <img src="{{ asset('assets/img/video_icon.png') }}" alt="">
                                            @elseif($file->library_file_type_id == 3)
                                                <img src="{{ asset('assets/img/book_icon.png') }}" alt="">
                                            @endif
                                            <div
                                                class="text-center text-neutral-800 text-sm font-semibold font-['Somar Sans'] capitalize leading-[14px]">
                                                {{ $file->name }}
                                            </div>
                                        </div>
                                        <a href="{{ env('APP_URL_ERP') . '/storage/' . $file->url }}"
                                            download="your-file-name" target="_blank">
                                            <i class="fa-solid fa-download text-primary fa-lg "></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="lg:col-span-1">
            <div class="  bg-white rounded-2xl p-8">
                <div class="grid gap-4">
                    @php
                        $prev = false;
                        $is_allowed = true;
                    @endphp
                    <div class=" flex justify-between items-center">
                        <div class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                            الوحدة الأولى _العقيدة الاسلامية
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/we7dat-date.png') }}" alt="">
                                <div class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                    12 مايو 2023</div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/img//task-complete.png') }}" width="32" height="32"
                            alt="">
                    </div>
                    {{-- </div> --}}
                    <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                    <div class="grid gap-4">
                        <div class=" flex justify-between items-center">
                            <div class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                الوحدة الأولى _العقيدة الاسلامية
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('assets/img/we7dat-date.png') }}" alt="">
                                    <div class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                        12 مايو 2023</div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/img//task-complete.png') }}" width="32" height="32"
                                alt="">
                        </div>
                        <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                        <div class="grid gap-4">
                            <div class=" flex justify-between items-center">
                                <div class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                    الوحدة الأولى _العقيدة الاسلامية
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/img/we7dat-date.png') }}" alt="">
                                        <div class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                            12 مايو 2023</div>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/img//task-complete.png') }}" width="32" height="32"
                                    alt="">
                            </div>
                            <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                            <div class="grid gap-4">
                                <div class=" flex justify-between items-center">
                                    <div
                                        class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                        الوحدة الأولى _العقيدة الاسلامية
                                        <div class="flex items-center gap-2">
                                            <img src="{{ asset('assets/img/we7dat-date.png') }}" alt="">
                                            <div class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                12 مايو 2023</div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/img//task-complete.png') }}" width="32"
                                        height="32" alt="">
                                </div>
                                <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                                <div class="grid gap-4">
                                    <div class=" flex justify-between items-center">
                                        <div
                                            class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                            الوحدة الأولى _العقيدة الاسلامية
                                            <div class="flex items-center gap-2">
                                                <img src="{{ asset('assets/img/we7dat-date.png') }}" alt="">
                                                <div class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                    12 مايو 2023</div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/img//task-complete.png') }}" width="32"
                                            height="32" alt="">
                                    </div>
                                    <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                                    <div class="grid gap-4">
                                        <div class=" flex justify-between items-center">
                                            <div
                                                class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                                الوحدة الأولى _العقيدة الاسلامية
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('assets/img/we7dat-date.png') }}"
                                                        alt="">
                                                    <div
                                                        class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                        12 مايو 2023</div>
                                                </div>
                                            </div>
                                            <img src="{{ asset('assets/img//task-complete.png') }}" width="32"
                                                height="32" alt="">
                                        </div>
                                        <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                                        <div class="grid gap-4">
                                            <div class=" flex justify-between items-center">
                                                <div
                                                    class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                                    الوحدة الأولى _العقيدة الاسلامية
                                                    <div class="flex items-center gap-2">
                                                        <img src="{{ asset('assets/img/we7dat-date.png') }}"
                                                            alt="">
                                                        <div
                                                            class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                            12 مايو 2023</div>
                                                    </div>
                                                </div>
                                                <img src="{{ asset('assets/img//task-complete.png') }}"
                                                    width="32" height="32" alt="">
                                            </div>
                                            <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                                            <div class="grid gap-4">
                                                <div class=" flex justify-between items-center">
                                                    <div
                                                        class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                                        الوحدة الأولى _العقيدة الاسلامية
                                                        <div class="flex items-center gap-2">
                                                            <img src="{{ asset('assets/img/we7dat-date.png') }}"
                                                                alt="">
                                                            <div
                                                                class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                                12 مايو 2023</div>
                                                        </div>
                                                    </div>
                                                    <img src="{{ asset('assets/img//task-complete.png') }}"
                                                        width="32" height="32" alt="">
                                                </div>
                                                <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                                                <div class="grid gap-4">
                                                    <div class=" flex justify-between items-center">
                                                        <div
                                                            class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                                            الوحدة الأولى _العقيدة الاسلامية
                                                            <div class="flex items-center gap-2">
                                                                <img src="{{ asset('assets/img/we7dat-date.png') }}"
                                                                    alt="">
                                                                <div
                                                                    class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                                    12 مايو 2023
                                                                </div>

                                                                <div class=" cent gap-2">
                                                                    <div class="text-zinc-600 text-sm font-normal ">
                                                                        |
                                                                    </div>
                                                                    <img src="{{ asset('assets/img/quiz.svg') }}"
                                                                        alt="" width="32" height="32">
                                                                    <span
                                                                        class="text-primary text-sm font-normal ">كويز</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img src="{{ asset('assets/img//task-complete.png') }}"
                                                            width="32" height="32" alt="">
                                                    </div>
                                                    <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                                                    <div class="grid gap-4">
                                                        <div class=" flex justify-between items-center">
                                                            <div
                                                                class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                                                الوحدة الأولى _العقيدة الاسلامية
                                                                <div class="flex items-center gap-2">
                                                                    <img src="{{ asset('assets/img/we7dat-date.png') }}"
                                                                        alt="">
                                                                    <div
                                                                        class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                                        12 مايو 2023</div>
                                                                </div>
                                                            </div>
                                                            <img src="{{ asset('assets/img//task-complete.png') }}"
                                                                width="32" height="32" alt="">
                                                        </div>
                                                        <div class=" h-0.5 opacity-60 bg-neutral-200">
                                                        </div>
                                                        <div class="grid gap-4">
                                                            <div class=" flex justify-between items-center">
                                                                <div
                                                                    class=" text-neutral-800 text-sm font-semibold  capitalize leading-7 text-start">
                                                                    الوحدة الأولى _العقيدة الاسلامية
                                                                    <div class="flex items-center gap-2">
                                                                        <img src="{{ asset('assets/img/we7dat-date.png') }}"
                                                                            alt="">
                                                                        <div
                                                                            class="text-zinc-600 text-sm font-normal  leading-7 text-start">
                                                                            12 مايو 2023</div>
                                                                    </div>
                                                                </div>
                                                                <img src="{{ asset('assets/img//task-complete.png') }}"
                                                                    width="32" height="32" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
