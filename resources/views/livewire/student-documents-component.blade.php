<div class="">
    <div class="flex md:justify-end justify-evenly md:gap-4 gap-2">
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
                    wire:click="select_course({{ null }})"
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

        <div x-data="{ sort: '{{ __('messages.file type') }}', type: false }" class="relative">
            <div class="px-4 py-2 gap-4 bg-white rounded-2xl border border-neutral-200 justify-between items-center inline-flex cursor-pointer"
                @click="type =!type" @click.away="type = false">
                <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                    <span x-text="sort"></span>
                </div>
                <div>
                    <div x-show="!type">
                        <i class="fa-solid fa-chevron-down "></i>
                    </div>
                    <div class="hidden" x-show="type" :class="type ? ' !block ' : ''"><i
                            class="fa-solid fa-chevron-up "></i>
                    </div>
                </div>
            </div>
            <ul class=" absolute hidden top-11 rtl:left-0 ltr:right-0 max-w-64 min-w-40  z-30 bg-white border rounded-xl drop-shadow-md  text-zinc-900  tracking-wider  sm:gap-1"
                @click="type = !type" :class="type ? '!grid' : ''" x-show="type">
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer   sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                    wire:click="select_type({{ null }})" @click="sort='{{ __('messages.all') }}'; type = !type"
                    :class="sort === 'empty' ? 'bg-red-50 text-red-900' : ''">
                    {{ __('messages.all') }}</li>

                @foreach (App\Models\LibraryFileType::all() as $type)
                    <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer   sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                        wire:click="select_type({{ $type->id }})"
                        @click="sort='{{ $type->name }}'; type = !type"
                        :class="sort === 'empty' ? 'bg-red-50 text-red-900' : ''">
                        {{ $type->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    @if ($course_files->count() == 0 && $session_files->count() == 0 && $product_files->count() == 0)
        {{-- Anwar (no files) --}}
        {{ __('messages.there are no files yet') }}
    @else
        <div class=" grid 2xl:grid-cols-3 md:grid-cols-2 gap-4 py-8">
            @foreach ($session_files as $file)
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
            @foreach ($course_files as $file)
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
            @foreach ($product_files as $file)
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
    @endif

</div>
