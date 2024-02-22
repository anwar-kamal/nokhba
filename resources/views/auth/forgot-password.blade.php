<x-layout-component>
    <x-slot name="header">false</x-slot>
    <x-slot name="footer">false</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? $page->title_ar }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
    @endif
    <x-slot name="content">
        <div class=" fixed inset-0">
            @php
                $main_image = langContent('main_image');
            @endphp
            <div class="relative">
                <div class="grid md:grid-cols-2 ">
                    <div class=" sticky top-0  cent bg-[#E2E2E2]">
                        <div class="container hidden md:grid gap-16 grid-rows-2    ">
                            <div class="flex justify-center items-end h-full pt-16 "><img
                                    src="{{ asset('assets/img/login-logo.png') }}">
                            </div>
                            <div class="px-8">
                                <h2
                                    class=" text-center text-neutral-800 text-3xl font-semibold capitalize leading-tight pb-[18px]">
                                    معهد
                                    النخبة
                                    القادة للتدريب العالي</h2>
                                <p class=" text-center text-neutral-700 text-lg ">
                                    لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في
                                    صناعات
                                    المطابع
                                    ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما
                                    قامت
                                    مطبعة
                                    مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container bg-white ">
                        <div class="w-full  relative grid gap-4 lg:px-8 items-center">

                            <div id="logo" class="cent pt-8  ">
                                <a href="{{ URL::to('/') }}"><img src="{{ asset('assets/img/Logo.png') }}"></a>
                            </div>
                            <div class="  relative ">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <input type="hidden" name="currentUrl" value="{{ request('currentUrl') }}">
                                    <div class="cent flex-col gap-8 pb-6">
                                        <div
                                            class="text-center text-neutral-800 md:text-2xl text-lg font-semibold capitalize">
                                            {{ __('messages.Confirm your email') }}</div>
                                    </div>
                                    @if (isset($errors))
                                        @if ($errors->has('error'))
                                            <div class="pb-6">
                                                <p class="text-red-700">{{ $errors->first('error') }}</p>
                                            </div>
                                        @endif
                                    @endif
                                    @if (isset($errors))
                                        @if ($errors->has('success'))
                                            <div class="pb-6">
                                                <p class="text-green-500">{{ $errors->first('success') }}</p>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="flex flex-col">
                                        <label for="email" class="login">{{ __('messages.Email') }}</label>
                                        <input class="drop-shadow-sm" name="email"
                                            placeholder="{{ __('messages.Email') }}" wire:model.defer="email">
                                        @error('email')
                                            <span class="error text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" wire:loading.attr="disabled"
                                            wire:loading.class="opacity-60" class="button-sec w-full">
                                            {{ __('messages.Email Password Reset Link') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </x-slot>
</x-layout-component>
