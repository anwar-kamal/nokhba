<div>
    <div class="py-16 container">
        <div class="swiper blogsSwiper py-16">
            <div class="swiper-wrapper">
                @foreach ($slideBlogs as $blog)
                    <a href="{{ URL::to('blog' . '/' . $blog['slug']) }}">
                        <div class="swiper-slide relative overflow-hidden rounded-2xl">
                            <img class="max-h-[600px] md:aspect-[2/1] lg:w-full aspect-[1/1] rounded-2xl"
                                src="{{ getImage($blog->main_image) }}" />
                            <div class="h-full w-full bg-gradient-to-t from-[#000000c2] absolute  inset-0 rounded-2xl">
                                <div class="flex items-end h-full w-full p-8">
                                    <div>
                                        <div class="flex">
                                            <span class="date">
                                                <img src="{{ asset('assets/img/date.png') }}">
                                                <span>{{ \Carbon\Carbon::parse($blog->date)->translatedFormat('d F Y') }}</span>
                                            </span>
                                        </div>
                                        @php
                                            $card_content = langContent('card_content');
                                        @endphp
                                        <div
                                            class="line-clamp-1 text-white md:text-[28px] font-bold capitalize leading-7 font-somar">
                                            {{ $blog->$card_content }}</div>
                                        <div class="text-start">
                                            <span
                                                class="text-neutral-200 md:text-lg text-sm font-normal capitalize leading-9 line-clamp-2">
                                                {{ $blog->$card_content }}
                                            </span>
                                            <a href="{{ URL::to('blog' . '/' . $blog['slug']) }}"
                                                class="text-white font-semibold capitalize leading-[18px]">
                                                {{ __('messages.Show more') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <section class="container p-4">
        <div class="cent flex-wrap gap-8">
            @foreach ($blogs as $blog)
                <a href="{{ URL::to('blog' . '/' . $blog['slug']) }}">
                    <div class="w-full md:w-[334px] bg-white rounded-[32px] border border-neutral-200 p-5">
                        <div class="w-full mb-5">
                            <img src="{{ getImage($blog->card_image) }}" class="rounded-[20px] w-full aspect-square">
                        </div>
                        <div>
                            <div class="flex">
                                <span class="date">
                                    <img src="{{ asset('assets/img/date.png') }}">
                                    <span>{{ \Carbon\Carbon::parse($blog->date)->translatedFormat('d F Y') }}</span>
                                </span>
                            </div>
                        </div>
                        @php
                            $card_content = langContent('card_content');
                        @endphp
                        <div>
                            <span class="text-zinc-600 text-lg font-normal capitalize leading-9 line-clamp-2">
                                {{ $blog->$card_content }}
                            </span>
                            <a href="{{ URL::to('blog' . '/' . $blog['slug']) }}"
                                class="text-red-800 text-lg font-semibold capitalize">
                                {{ __('messages.Show more') }}
                            </a>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <div class="cent py-8">
        <button class="button-sec" wire:click="loadMoreBlogs" wire:loading.attr="disabled"
            wire:loading.class="opacity-60">{{ __('messages.Show more') }}</button>
    </div>
</div>
