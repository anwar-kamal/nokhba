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
        <section class=" fixed inset-0" x-data="{ modal: false }">
            @php
                $main_image = langContent('main_image');
            @endphp
            <img src="{{ getImage($page->$main_image) }}" alt="main_image"
                class="w-full h-full hidden md:block inset-0 fixed">
            <div class="fixed inset-0 md:bg-[#0000009c] cent z-50" x-show="!modal">
                <div class="grid lg:grid-cols-3 md:grid-cols-2  container ">
                    <div class="lg:col-span-2 flex items-center p-10 brightness-200 contrast-200">
                        <img src="{{ asset('assets/img/login-logo.png') }}" class="brightness-200 contrast-200">
                    </div>
                    <div class="col-span-1 overflow-auto z-50">
                        <div class=" md:p-8 p-4 bg-white rounded-[32px] relative overflow-auto">
                            <div id="logo" class=" cent md:hidden ">
                                <a href="{{ URL::to('/') }}"><img src="{{ asset('assets/img/Logo.png') }}"
                                        class="aspect-square" width="50"></a>
                            </div>
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
                                    <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-60"
                                        class="button-sec w-full"> {{ __('messages.Email Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layout-component>
