<div class=" p-6 bg-white rounded-2xl border border-neutral-200 grid gap-2">
    <div class="flex justify-between items-center">
        <div class="grid  gap-3">
            <div class="text-neutral-700 text-sm font-semibold font-['Somar Sans'] capitalize leading-[14px]">
                {{ $title ?? '' }}
            </div>
            <div class="text-zinc-600 text-opacity-80 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                {{ $content ?? '' }}
            </div>
        </div>
        @if (isset($link) && $link)
            <a href="{{ $link ?? '' }}"
                class=" text-primary border border-primary disabled:text-slate-300 disabled:border-slate-300 cent rounded-full w-10 h-10">
                <i class="fa-solid fa-arrow-right rtl:hidden"></i>
                <i class="fa-solid fa-arrow-left ltr:hidden"></i>
            </a>
        @else
            <button disabled
                class=" text-primary border border-primary disabled:text-slate-300 disabled:border-slate-300 cent rounded-full w-10 h-10">
                <i class="fa-solid fa-arrow-right rtl:hidden"></i>
                <i class="fa-solid fa-arrow-left ltr:hidden"></i>
            </button>
        @endif
    </div>
</div>
