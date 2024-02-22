<div>
    <div
        class="w-full overflow-hidden rounded-2xl  custom__drop__shadow  shadow-blue-200 md:min-w-[300px] sm:mx-10 md:mx-0 md:max-w-[340px] relative h-96 ">
        <a href=""
            class=" absolute ltr:right-0 rtl:left-0 drop-shadow-2xl border bg-white  w-12 h-12 rounded-full m-3 p-2.5  hover:scale-100 duration-150 z-[50] scale-90 ">
            <img src="{{ asset('assets/img/cart.png') }}" alt="cart" class="h-full w-full ltr:scalex[-1] transform ">
        </a>
        <a href="{{ get_page_permalink($course['slug']) }}"
            class="absolute inset-0 bg-gradient-to-t from-black bg-opacity-10 flex flex-col justify-end">
            @php
                $card_title = langContent('card_title');
                $card_content = langContent('card_content');
                $course_id = isset($course['diploma_system_field']) && array_key_exists('value', $course['diploma_system_field']) ? $course['diploma_system_field']['value'] : null;
                $price = App\Models\InstallmentPackage::findOrFail($course_id)->total_amount;
            @endphp
            <div class="w-full grid gap-2 text-white p-4">
                <div class="text-lg">{{ $course[$card_title] }}
                </div>
                <div class="text-xs relative">
                    <span class="opacity-75 ">{{ Str::limit($course[$card_content], 90) }}
                    </span>
                    <span class="see-more">
                        {{ __('messages.view more') }}
                    </span>

                </div>
                <p class=" text-lg">
                    {{ $price }} {{ __('messages.SR') }}
                </p>
            </div>
        </a>
        <img src="{{ getImage($course['card_image']['path']) }}"
            alt="{{ $course['card_image']['alt'] ?? 'course-img' }}" class="h-full w-full">
    </div>
</div>
