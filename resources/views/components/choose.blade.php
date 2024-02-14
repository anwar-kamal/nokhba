<div class="" x-data="{ {{ $id }}: false }">
    <div class=" relative max-md:w-full min-w-[200px] ">
        <div class="px-4 py-2 md:gap-4 gap-1 bg-white rounded-2xl border border-neutral-200 justify-between items-center inline-flex cursor-pointer w-full"
            @click="{{ $id }} =!{{ $id }}">
            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                {{ $label ?? __('messages.choose an option') }}
            </div>
            <div>
                <i class="fa-solid fa-chevron-down" x-show="!{{ $id }}"></i>
                <i class="fa-solid fa-chevron-up" x-show="{{ $id }}"></i>
            </div>
        </div>
        <ul class=" absolute top-9 w-full  z-30 bg-white border rounded-xl drop-shadow-md  text-zinc-900  tracking-wider grid sm:gap-1  my-2"
            x-show="{{ $id }}">
            {{$slot}}
            {{-- <li class="hover:bg-primary hover:text-white rounded-xl text-center sm:p-3 cursor-pointer  sm:text-base  text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                @click="sort='empty'" :class="sort === 'empty' ? 'bg-red-50 text-red-900' : ''">
                دورات اليوم</li>
            <li class="hover:bg-primary hover:text-white rounded-xl text-center sm:p-3 cursor-pointer  sm:text-base  text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                @click="sort='finished'" :class="sort === 'finished' ? 'bg-red-50 text-red-900' : ''">
                دورات مكتملة</li>
            <li class="hover:bg-primary hover:text-white rounded-xl text-center sm:p-3 cursor-pointer  sm:text-base  text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                @click="sort='all'" :class="sort === 'all' ? 'bg-red-50 text-red-900' : ''">
                جميع </li> --}}
        </ul>
    </div>
</div>
