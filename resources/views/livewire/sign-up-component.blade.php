<div>
    <div class="fixed inset-0 md:bg-[#0000009c] cent z-50" x-show="!modal">
        <div class="grid lg:grid-cols-3 md:grid-cols-2  container ">
            <div class="lg:col-span-2 flex items-center p-10 brightness-200 contrast-200">
                <img src="{{ asset('assets/img/login-logo.png') }}" class="brightness-200 contrast-200">
            </div>
            <div class="col-span-1 overflow-auto z-50">
                <div class="p-4 bg-white rounded-[32px] relative overflow-auto">
                    <div id="logo" class=" cent md:hidden ">
                        <a href="{{ URL::to('/') }}"><img src="{{ asset('assets/img/Logo.png') }}"
                                class="aspect-square" width="50"></a>
                    </div>
                    <div>
                        <div class="cent flex-col gap-8 ">
                            <div class="text-center text-neutral-800 md:text-2xl text-lg font-semibold capitalize">
                                {{ __('messages.Create your account now') }}</div>
                            <div class="w-full flex justify-start pb-6">
                                <span
                                    class="text-zinc-600 md:text-lg font-normal capitalize">{{ __('messages.do you have an account?') }}</span>
                                <a href="{{ URL::to('/' . 'login-student') }}" class="text-neutral-800 ">
                                    <span class="text-red-800 md:text-lg font-semibold capitalize mx-1">
                                        {{ __('messages.login') }}</span>
                                </a>
                            </div>
                        </div>
                        <div id="form" class="flex flex-col gap-4">
                            <div class="flex flex-col">
                                <label for="name" class="login">{{ __('messages.Name') }}</label>
                                <input type="name" class="drop-shadow-sm" name="email"
                                    placeholder="{{ __('messages.Name') }}" wire:model="name">
                                @error('name')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="email" class="login">{{ __('messages.Email') }}</label>
                                <input type="email" class="drop-shadow-sm" name="email"
                                    placeholder="{{ __('messages.Email') }}" wire:model="email">
                                @error('email')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="phone" class="login">{{ __('messages.phone') }}</label>
                                <input type="text" class="drop-shadow-sm" name="phone"
                                    placeholder="{{ __('messages.phone') }}" wire:model="phone">
                                @error('phone')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" flex flex-col">
                                <label class="login" for="lang">الجنسيه</label>
                                <select name="lang" wire:model.defer="nationality_id"
                                    class="text-gray-900 border border-gray-100 rounded-lg">
                                    <option value="" disabled selected hidden> اختار الجنسيه </option>
                                    @foreach (\App\Models\Nationality::all() as $nationality)
                                        <option value="{{ $nationality->id }}">{{ $nationality->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" flex flex-col">
                                <label class="login" for="password">{{ __('messages.Password') }}</label>
                                <div class="relative cent" x-data="{ password: '', showEye: false }">
                                    <input class="w-full drop-shadow-sm" type="password" id="password" name="password"
                                        required="required" placeholder="{{ __('messages.Password') }}"
                                        wire:keydown.enter="login" x-model="password"
                                        x-on:input.debounce.300ms="showEye = password !== ''" wire:model="password" />
                                    {{-- <i id="eye" x-show="showEye"
                                        class="absolute ltr:right-2 rtl:left-2 text-neutral-700 fa-regular fa-eye ltr:ml-20 cursor-pointer hover:text-primary"
                                        x-on:click="togglePassword ( 'password', 'eye' )"></i> --}}
                                </div>
                                @error('password')
                                    <span class="error text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" flex flex-col">
                                <label class="login" for="password">تأكيد كلمة السر</label>
                                <div class="relative cent" x-data="{ password: '', showEye: false }">
                                    <input class=" w-full drop-shadow-sm" type="password" id="password2" name="password"
                                        required="required" placeholder=" تأكيد كلمة السر " x-model="password"
                                        x-on:input.debounce.300ms="showEye = password !== ''"
                                        wire:model="password_confirmation" />
                                    {{-- <i x-show="showEye" id="eye2"
                                        class="absolute ltr:right-2 rtl:left-2 text-neutral-700 fa-regular fa-eye ltr:ml-20 cursor-pointer hover:text-primary"
                                        x-on:click="togglePassword ( 'password2', 'eye2' )"></i> --}}
                                </div>
                            </div>
                            <div>
                                <button wire:click="register" wire:loading.attr="disabled"
                                    wire:loading.class="opacity-60" class="button-sec w-full"> اشترك الآن </button>
                            </div>
                        </div>
                        <div class="cent gap-2 py-5">
                            <div class="w-full h-px opacity-60 bg-neutral-200 rounded-[100px]"></div>
                            <div class="text-neutral-800 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                {{ __('messages.or') }}</div>
                            <div class="w-full h-px opacity-60 bg-neutral-200 rounded-[100px]"></div>
                        </div>
                        <div class="cent gap-2 h-[45px]">
                            <img src="{{ asset('assets/img/login-social.png') }}" alt="login-social">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
