<div class="w-full">
    <button id="course_{{ $model_id }}"
        @if ($check) disabled @else wire:click="addToCard" wire:loading.attr="disabled" @endif
        class="py-2 px-6 text-lg md:text-2xl leading-7 md:leading-11 md:font-bold rounded-xl border-2 text-[#9F1916] border-[#9F1916] bg-white w-full cent gap-1">
        @if ($check)
            <img src="{{ asset('assets/img/check_add.svg') }}" alt="cart" class="h-full w-6">
            <span class="text-center text-lg font-semibold capitalize leading-[14px] py-2">
                {{ __('messages.Added successfully') }}
            </span>
        @else
            <img src="{{ asset('assets/img/cart.png') }}" alt="cart" class="h-full w-6">
            <span class="text-center text-lg font-semibold capitalize leading-[14px] py-2">
                {{ __('messages.Add to cart') }}
            </span>
        @endif
    </button>
</div>
