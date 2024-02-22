<div class="bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
    <div class="cent gap-2">
        {{$icon ?? ""}}

        <div class="">
            <div class="text-center text-neutral-800 text-sm font-semibold font-['Somar Sans'] capitalize leading-[14px]">{{ $title ?? "" }}</div>
            {{$type_name ?? ""}}
        </div>
    </div>
    <a href="{{ env('APP_URL_ERP') . '/storage/' . $url }}" download="your-file-name" target="_blank">
        <i class="fa-solid fa-download text-primary fa-lg "></i>
    </a>
</div>
