<div>
    <div class="grid md:grid-cols-2  ">
        <div class="sticky top-0  cent bg-[#E2E2E2]">
            <div class="container hidden md:grid gap-16 grid-rows-2    ">
                <div class="flex justify-center items-end h-full pt-16 "><img
                        src="{{ asset('assets/img/login-logo.png') }}">
                </div>
                <div class="px-8">
                    <h2 class=" text-center text-neutral-800 text-3xl font-semibold capitalize leading-tight pb-[18px]">
                        معهد
                        النخبة
                        القادة للتدريب العالي</h2>
                    <p class=" text-center text-neutral-700 text-lg ">
                        لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات
                        المطابع
                        ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة
                        مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص.
                    </p>
                </div>
            </div>
        </div>
        <div class="  container bg-white ">
            <div class="w-full  relative grid gap-4 lg:px-8">
                <div id="logo" class="cent pt-8  ">
                    <a href="{{ URL::to('/') }}"><img src="{{ asset('assets/img/Logo.png') }}"></a>
                </div>
                <div class=" grid gap-4 items-center">
                    <div class="flex flex-col gap-4 ">
                        <div class=" text-neutral-800 md:text-2xl text-lg font-semibold capitalize">
                            {{ __('messages.Create your account now') }}</div>
                        <div class="w-full flex justify-start ">
                            <span
                                class="text-zinc-600 md:text-lg font-normal capitalize">{{ __('messages.do you have an account?') }}</span>
                            <a href="{{ URL::to('/' . 'login-student') }}" class="text-neutral-800 ">
                                <span class="text-red-800 md:text-lg font-semibold capitalize mx-1">
                                    {{ __('messages.login') }}</span>
                            </a>
                        </div>
                    </div>
                    <div id="form" class="grid gap-4">
                        <div class="grid">
                            <label for="name" class="login">{{ __('messages.Name') }}</label>
                            <input type="name" class="drop-shadow-sm" name="email"
                                placeholder="{{ __('messages.Name') }}" wire:model="name">
                            @error('name')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid">
                            <label for="email" class="login">{{ __('messages.Email') }}</label>
                            <input type="email" class="drop-shadow-sm" name="email"
                                placeholder="{{ __('messages.Email') }}" wire:model="email">
                            @error('email')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid">
                            <label for="phone" class="login">{{ __('messages.phone') }}</label>
                            <input type="text" class="drop-shadow-sm" name="phone"
                                placeholder="{{ __('messages.phone') }}" wire:model="phone">
                            @error('phone')
                                <span class="error text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" grid">
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
                        <div class=" grid">
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
                        <div class=" grid">
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
                        <div class="cent">
                            <button wire:click="register" wire:loading.attr="disabled" wire:loading.class="opacity-60"
                                class="button-sec w-2/3"> اشترك الآن </button>
                        </div>
                    </div>
                    <div class="cent gap-2 pt-4">
                        <div class="w-full h-px opacity-60 bg-neutral-200 rounded-[100px]"></div>
                        <div class="text-neutral-800 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                            {{ __('messages.or') }}</div>
                        <div class="w-full h-px opacity-60 bg-neutral-200 rounded-[100px]"></div>
                    </div>
                    <div class="cent">
                        <a href=""><img src="{{ asset('assets/img/login-social.png') }}"
                                alt="login-social"></a>
                        <a href=""><img src="{{ asset('assets/img/login-social-2.png') }}"
                                alt="login-social"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
