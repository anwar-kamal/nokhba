<div class="w-full h-[90px] bg-white rounded-2xl border border-neutral-200 grid grid-cols-2 p-5 ">
    <div>
        <div class=" text-neutral-800 text-xl font-semibold capitalize leading-tight pb-2">
            {{ $title ?? ' ' }}</div>
        <div class=" text-zinc-600 text-base font-normal  leading-none">
            {{$slot}}
        </div>
    </div>
    <div class=" flex justify-end ">
        <img src="{{ $icon ?? ' ' }}" alt="">
    </div>
</div>
