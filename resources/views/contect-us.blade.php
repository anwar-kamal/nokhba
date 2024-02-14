<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? $page->title_ar }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        @php
            $image_bread_crumb = langContent('image_bread_crumb');
        @endphp
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
        @if ($page->image_bread_crumb)
            <x-slot name="image_bread_crumb">{{ $page->image_bread_crumb }}</x-slot>
        @endif
    @endif
    <x-slot name="content">
        <section>
            <div class=" grid gap-8 container">
                <div class=" grid lg:grid-cols-5  gap-x-32 gap-8 ">
                    <div class="lg:col-span-3 grid gap-8">

                        <img src="https://cv-in-arabic.com/wp-content/uploads/2023/05/%D9%85%D9%85%D8%AB%D9%84-%D8%AE%D8%AF%D9%85%D8%A9-%D8%A7%D9%84%D8%B9%D9%85%D9%84%D8%A7%D8%A1-%D8%A7%D9%84%D8%B3%D9%8A%D8%B1%D8%A9-%D8%A7%D9%84%D8%B0%D8%A7%D8%AA%D9%8A%D8%A9-1.jpg"
                            alt="" class=" w-full  aspect-video rounded-2xl overflow-hidden">

                        <h1 class="text-neutral-800  font-bold capitalize text-2xl font-somar ">
                            {{ __('messages.Contact our team') }}</h1>
                        <h2 class="text-zinc-600  font-normal  capitalize text-lg line-clamp-5">
                            {{ __('messages.Lorem Ipsum is simply dummy text (meaning the intent is form, not content) and is used by the printing and publishing industries. Lorem Ipsum has been the standard for dummy text since the 15th century, when an unknown printing press randomly scribbled a set of characters taken from a text.') }}
                        </h2>

                    </div>

                    <div class="lg:col-span-2 bg-gray-50 rounded-2xl border border-neutral-200 md:p-4 p-2 py-8 self-start ">
                        @livewire('form-contact-us-component')
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-8 my-4">


                    <div class="bg-white rounded-2xl  flex items-center  gap-3">
                        <div class=" shrink-0"><img src="{{ asset('assets/img/phone.png') }}" alt=""
                                width="50" height="50"></div>
                        <div class=" grid gap-2">
                            <div class="text-neutral-600 text-base font-semibold  capitalize leading-none">
                                {{ __('messages.phone number') }}</div>
                            <div class="text-zinc-600 text-sm font-normal  leading-[14px]">
                                {{ getGlobal('phone')['phone'] }}</div>
                        </div>
                    </div>
                    <div class=" bg-white rounded-2xl  flex items-center  gap-3">
                        <div class=" shrink-0"><img src="{{ asset('assets/img/mail.png') }}" alt="phone"
                                width="50" height="50">
                        </div>
                        <div class=" grid gap-2">
                            <div class="text-neutral-600 text-base font-semibold capitalize leading-none">
                                {{ __('messages.email') }}</div>
                            <div class="text-zinc-600 text-sm font-normal leading-[14px] w-full break-words">
                                {{ getGlobal('email')['email'] }}</div>
                        </div>
                    </div>
                    @php
                        $title = langContent('title');
                        $full_address = langContent('full_address');
                    @endphp
                    <div class="w-full  bg-white rounded-2xl  flex items-center  gap-3">
                        <div class=" shrink-0"><img src="{{ asset('assets/img/location.png') }}" alt=""
                                width="50" height="50"></div>
                        <div class=" grid gap-2">
                            <div class="text-neutral-600 text-base font-semibold  capitalize leading-none">
                                {{ getGlobal('address')[$title] }}</div>
                            <div class=" text-zinc-600 text-sm font-normal  leading-[21px]">
                                {{ getGlobal('address')[$full_address] }}</div>
                        </div>
                    </div>
                </div>
                <div class=" p-2">
                    <iframe class="rounded-2xl  overflow-hidden"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3712.5034748273906!2d39.22313751494054!3d21.487990585751458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb6a5d8c03f9a1ca8!2z2YXYudmH2K8g2KjYsdmI2YTZitiv2LHYsiAtINmB2LHYuSDYp9mE2YHZitit2KfYoQ!5e0!3m2!1sen!2seg!4v1635770676962!5m2!1sen!2seg"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </x-slot>
</x-layout-component>
