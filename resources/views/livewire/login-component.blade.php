<div>
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
                    <div>
                        <div class="cent flex-col gap-8 pb-6">
                            <div class="text-center text-neutral-800 md:text-2xl text-lg font-semibold capitalize">
                                {{ __('messages.Start logging in now') }}</div>
                            @if (basename(Request::path()) !== 'login-trainers')
                                <div class="w-full flex justify-start">
                                    <span
                                        class="text-zinc-600 md:text-lg font-normal capitalize">{{ __('messages.New user') }}</span>
                                    <a href="{{ URL::to('/' . 'sign-up') }}" class="text-neutral-800 ">
                                        <span class="text-red-800 md:text-lg font-semibold capitalize mx-1">
                                            {{ __('messages.Create your account now') }}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div id="form" class=" flex flex-col gap-8">
                            <div class="flex flex-col">
                                <label class="login" for="email">{{ __('messages.Email or username') }}</label>
                                <input class="drop-shadow-sm" name="email" wire:model="email" required
                                    placeholder="{{ __('messages.Email or username') }}">
                                @error('email')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="login" for="password">{{ __('messages.Password') }}</label>
                                <div class="relative cent" x-data="{ password: '', showEye: false }">
                                    <input class="w-full drop-shadow-sm" type="password" id="password" name="password"
                                        required="required" placeholder="{{ __('messages.Password') }}"
                                        wire:keydown.enter="login" x-model="password"
                                        x-on:input.debounce.300ms="showEye = password !== ''" wire:model="password" />
                                    <i id="eye" x-show="showEye"
                                        class="absolute ltr:right-2 rtl:left-2 text-neutral-700 fa-regular fa-eye ltr:ml-20 cursor-pointer hover:text-primary"
                                        onclick="togglePassword ( 'password', 'eye' )"></i>
                                    </div>
                                    @error('password')
                                        <span class="error text-red-600">{{ $message }}</span>
                                    @enderror
                                <div class=" flex justify-between items-center">
                                    <div class="py-8 flex gap-2">
                                        <input type="checkbox" id="terms-select-checkbox" name="terms-select-checkbox"
                                            wire:model="remember"
                                            class="w-6 h-6 text-primary bg-gray-100 border-gray-300 rounded focus:ring-red-500"
                                            wire:keydown.enter="login" />
                                        <label for="terms-select-checkbox"
                                            class="">{{ __('messages.Remember me') }}</label>
                                    </div>
                                    @php
                                        $parseUrl = explode('-', basename(parse_url(Request::url(), PHP_URL_PATH)));
                                        $currentUrl = $parseUrl[0] !== 'update' ? $parseUrl[1] : null;
                                    @endphp
                                    <a href="{{ env('APP_URL') . '/' . 'forgot-password' . '?currentUrl=' . $currentUrl }}"
                                        class="text-red-800 text-sm font-semibold font-['Somar Sans'] capitalize leading-[14px]">
                                        {{ __('messages.Forgot password?') }}</a>
                                </div>
                                <div class="cent">
                                    <button class="button-sec w-4/5" wire:click="login" wire:loading.attr="disabled"
                                        wire:loading.class="opacity-60">{{ __('messages.Sign in') }}</button>
                                </div>
                            </div>
                            @if (basename(Request::path()) !== 'login-trainers')
                                <div class="cent gap-2 py-5">
                                    <div class="w-full h-px opacity-60 bg-neutral-200 rounded-[100px]"></div>
                                    <div
                                        class="text-neutral-800 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                        {{ __('messages.or') }}</div>
                                    <div class="w-full h-px opacity-60 bg-neutral-200 rounded-[100px]"></div>
                                </div>
                                <div class="cent gap-2 ">
                                    <img src="{{ asset('assets/img/login-social.png') }}" alt="login-social">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
