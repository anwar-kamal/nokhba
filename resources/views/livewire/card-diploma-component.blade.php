<div>
    <div
        class="w-full overflow-hidden rounded-2xl custom__drop__shadow drop-shadow-sm my-1 md:min-w-[300px] sm:mx-10 md:mx-0 md:max-w-[340px] bg-white">
        <a class="w-full aspect-square" href="{{ get_page_permalink($diploma['slug']) }}">
            <img src="{{ getImage($diploma['card_image']['path']) }}" class="aspect-square w-full" alt="diploma-photo">
        </a>
        <div class="p-3">
            <a href="{{ get_page_permalink($diploma['slug']) }}" class=" grid gap-4">
                <h3 class=" text-neutral-800 font-semibold capitalize  line-clamp-1">
                    {{ $diploma[$card_title] }}</h3>
                <p class="text-zinc-600 text-sm leading-[21px] line-clamp-2 relative">
                    <span>{{ Str::words($diploma[$card_content], 14) }}</span>
                </p>
                <div class="text-red-800 text-sm font-semibold capitalize text-end">
                    <a href="{{ get_page_permalink($diploma['slug']) }}">{{ __('messages.view more') }}</a>
                </div>
                <hr class=" my-2">
                <div class="justify-between items-center flex py-1 ">
                    <div class="text-neutral-800  font-semibold capitalize leading-tight">
                        {{ number_format($price, 0, '.', '') }}
                        {{ __('messages.SR') }}</div>
                    <button class="button-sec h-10">
                        <a href="{{ get_page_permalink($diploma['slug']) }}">
                            {{ __('messages.register') }}</a>
                    </button>
                </div>
            </a>
        </div>
    </div>
</div>
