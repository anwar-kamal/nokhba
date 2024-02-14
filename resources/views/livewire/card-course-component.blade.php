<div>
    <div
        class="w-full overflow-hidden rounded-2xl border-2 md:min-w-[300px] sm:mx-10 md:mx-0 md:max-w-[340px] relative h-96">
        <div class="inset-0 absolute bg-gradient-to-t from-black bg-opacity-10 flex flex-col items-end justify-between">
            <a href="#" class="bg-white w-11 h-11 rounded-full m-4 p-2 drop-shadow-md hover:p-1.5 duration-300">
                <img src="{{ asset('assets/img/cart.png') }}" alt="cart" class="h-full w-full">
            </a>
            @php
                $card_title = langContent('card_title');
                $card_content = langContent('card_content');
                $course_id = isset($course['diploma_system_field']) && array_key_exists('value', $course['diploma_system_field']) ? $course['diploma_system_field']['value'] : null;
                $price = App\Models\InstallmentPackage::findOrFail($course_id)->total_amount;
            @endphp
            <div class="w-full grid gap-2 text-white p-4">
                <div class="text-lg">{{ $course[$card_title] }}</div>
                <div class="text-xs relative">
                    <span class="opacity-75 ">{{ $course[$card_content] }} </span>
                    <a href="{{ get_page_permalink($course['slug']) }}"
                        class="see-more">{{ __('messages.view more') }}...</a>
                </div>
                <p class=" text-lg">
                    {{ $price }} {{ __('messages.SR') }}
                </p>
            </div>
        </div>
        <img src="{{ getImage($course['card_image']['path']) }}"
            alt="{{ $course['card_image']['alt'] ?? 'course-img' }}" class="h-full w-full">
    </div>
</div>
