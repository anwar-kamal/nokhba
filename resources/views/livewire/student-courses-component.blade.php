<div>
    <div class=" w-full  flex justify-center md:justify-between items-center  flex-wrap gap-x-2">
        <div class="my-5 relative   min-w-[250px]">
            <input type="text" class=" w-full drop-shadow-xl ltr:-mr-10 rtl:-ml-10" wire:model.live="name"
                placeholder="{{ __('messages.search here') }}...">
            <button class=" button-search z-40 absolute top-0 bottom-0  ltr:right-0 rtl:left-0" wire:click="search">
                <img src="{{ asset('assets/img/search-normal.png') }}" alt="" class=""></button>
        </div>
        <ul
            class="  p-1 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider cent sm:gap-1 font-semibold my-2">
            <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold whitespace-nowrap sm:text-base text-xs px-2
            {{$course_tab == 'current' ? 'bg-red-50 text-red-900' : ''}}" wire:click="move_to('current')">
                {{ __('messages.current courses') }}</li>
            <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold whitespace-nowrap sm:text-base text-xs px-2
            {{$course_tab == 'completed' ? 'bg-red-50 text-red-900' : ''}}" wire:click="move_to('completed')">
                {{ __('messages.completed courses') }}</li>
            <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold whitespace-nowrap sm:text-base text-xs px-2
            {{$course_tab == 'all' ? 'bg-red-50 text-red-900' : ''}}" wire:click="move_to('all')">
                {{ __('messages.all courses') }}</li>
        </ul>
    </div>
    <div>
        @if ($courses->count() > 0)
            <div class="grid-autoo gap-8">
                @foreach ($courses as $course)
                @php
                        $product = $course->course_level ? $course->course_level->product : '';
                        $course_customer = App\Services\CustomerService::course_course_customer($course->id)->first();
                        $semester = App\Services\CustomerService::course_semester($course->id);
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
                        <x-slot name="badge">{{ $semester ? $semester->name : "" }}</x-slot>
                        <x-slot name="title"> {{ $product_name }}</x-slot>
                        <x-slot name="percentage">{{ $per }}</x-slot>
                        <x-slot name="link">course-details</x-slot>
                        <x-slot name="link_id">{{$course->id}}</x-slot>
                        @if ($course->course_status_id == 2)
                            <x-slot name="link_title">{{ __('messages.complete course') }}</x-slot>
                        @else
                            <x-slot name="link_title">{{ __('messages.show course') }}</x-slot>
                        @endif
                    </x-image-card>
                @endforeach
            </div>
        @else
            <div class=" flex items-center justify-center gap-8 ">
                <img src="{{ asset('assets/img/no-dawarat.png') }}" alt="">
            </div>
        @endif
    </div>
</div>
