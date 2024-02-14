<div class="  rounded-2xl border border-neutral-200 bg-white grid grid-cols-7 overflow-hidden ">
    <div class="col-span-2">
        <img src="{{ $image ?? '' }}" class=" h-full w-full" alt="">
    </div>
    <div class=" col-span-5 p-4 grid  gap-4">
        <div class="flex">
            <div class="p-2 bg-blue-600 bg-opacity-5 rounded-md gap-2.5 cent">
                <div class="text-center text-blue-600 text-xs font-medium tracking-wide  ">
                    {{ $badge ?? '' }}
                </div>
            </div>
        </div>
        <div class="  text-neutral-800 text-sm font-semibold font- capitalize  line-clamp-1 tracking-wide">
            {{ $title ?? '' }}
        </div>
        {{ $slot }}
        <div class="cent gap-3">
            <div class="w-full bg-gray-200 rounded-full ">
                <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p leading-none rounded-full"
                    style="width: {{ $percentage ? $percentage . '%' : '' }}"> &nbsp;
                </div>
            </div>
            {{ $percentage ? $percentage . '%' : '' }}
        </div>
        <div class=" flex justify-end">
            <button
                @if (isset($link) && $link)
                    onclick="dispatchNavigate('{{ $link }}','{{ $link_id }}')"
                @endif
                class="cent gap-2 text-primary text-sm">
                <div class="text-center   font-semibold  capitalize ">
                    {{ $link_title ?? '' }}</div>
                <div>
                    <i class="fa-solid fa-chevron-left ltr:hidden"></i>
                    <i class="fa-solid fa-chevron-right rtl:hidden"></i>
                </div>
            </button>
        </div>
    </div>
</div>
<script>
    function dispatchNavigate(link,link_id) {
        Livewire.dispatch('navigate', {to_tab: link, courseId: link_id});
    }
</script>
