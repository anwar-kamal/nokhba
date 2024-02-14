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
        <section class="fixed inset-0" x-data="{ modal: false }">
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
                            <div id="logo" class=" cent md:hidden">
                                <a href="{{ URL::to('/') }}"><img src="{{ asset('assets/img/Logo.png') }}"
                                        class="aspect-square" width="50"></a>
                            </div>
                            @php
                                $token = request('token');
                                $email = request('email');
                                $currentUrl = request('currentUrl');
                            @endphp
                            <form method="POST" action="{{ route('reset') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="currentUrl" value="{{ $currentUrl }}">
                                <div class="cent flex-col gap-8 pb-6">
                                    <div
                                        class="text-center text-neutral-800 md:text-2xl text-lg font-semibold capitalize">
                                        {{ __('messages.Set a new password') }}</div>
                                </div>
                                @if (isset($errors))
                                    @if ($errors->has('error'))
                                        <div>
                                            <p class="text-red-700">{{ $errors->first('error') }}</p>
                                        </div>
                                    @endif
                                @endif
                                <div class=" flex flex-col gap-8 py-8">
                                    <div class=" flex flex-col">
                                        <label class="login" for="password">{{ __('messages.new password') }}</label>
                                        <div class="relative cent" x-data="{ password: '', showEye: false }">
                                            <input class=" w-full drop-shadow-sm" type="password" id="password"
                                                name="password" required="required"
                                                placeholder="{{ __('messages.new password') }}" x-model="password"
                                                x-on:input.debounce.300ms="showEye = password !== ''" />
                                            {{-- <i id="eye" x-show="showEye"
                                                class=" absolute ltr:right-2 rtl:left-2 text-neutral-700 fa-regular fa-eye ltr:ml-20 cursor-pointer hover:text-primary"
                                                x-on:click="togglePassword ( 'password', 'eye' )"></i> --}}
                                        </div>
                                        @error('password')
                                            <span class="error text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class=" flex flex-col">
                                        <label class="login"
                                            for="password">{{ __('messages.Confirm the new password') }}</label>
                                        <div class="relative cent" x-data="{ password: '', showEye: false }">
                                            <input class="w-full drop-shadow-sm" type="password" id="new-password"
                                                name="password_confirmation" required="required"
                                                placeholder="{{ __('messages.Confirm the new password') }}"
                                                x-model="password"
                                                x-on:input.debounce.300ms="showEye = password !== ''" />
                                            {{-- <i id="confirm-eye" x-show="showEye"
                                                class=" absolute ltr:right-2 rtl:left-2 text-neutral-700 fa-regular fa-eye ltr:ml-20 cursor-pointer hover:text-primary"
                                                x-on:click="togglePassword ( 'new-password', 'confirm-eye' )"></i> --}}
                                        </div>
                                        @error('password_confirmation')
                                            <span class="error text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="cent">
                                        <button type="submit"
                                            class="button-sec w-4/5">{{ __('messages.Confirm') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </x-slot>
</x-layout-component>
