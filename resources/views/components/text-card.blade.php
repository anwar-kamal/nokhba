<div class="p-4 grid gap-2 rounded-2xl border border-neutral-200  bg-white">
    <div class="flex">
        <div class=" p-2  bg-blue-600 bg-opacity-5 rounded  gap-2.5 cent  ">
            @if ($badge_icon)
                <img src="{{ $badge_icon ?? ' ' }}" alt="">
            @endif
            <div class="text-center text-blue-600 text-sm font-normal ">
                {{ $badge ?? ' ' }}</div>
        </div>
    </div>
    <div class=" text-start text-neutral-700 text-base font-semibold  capitalize leading-none">
        {{ $title ?? ' ' }}</div>
    {{ $slot }}
    <div class="flex justify-end">
        <button
            @if (!isset($link) || !$link) disabled
            @elseif (isset($link) || $link)
                wire:click="{{ $link }}" @endif
            class="text-primary disabled:text-slate-300">
            <a class="cent gap-2  text-sm">
                <div class="text-center   font-semibold  capitalize ">
                    {{ $link_title ?? ' ' }}</div>
                <div>
                    <i class="fa-solid fa-chevron-left ltr:hidden"></i>
                    <i class="fa-solid fa-chevron-right rtl:hidden"></i>
                </div>
            </a>
        </button>
    </div>
</div>
