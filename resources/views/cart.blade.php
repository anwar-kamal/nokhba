<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? ($page->title_ar ? $page->title_ar : $page->title) }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    @if ($bread_crumb->value())
        <x-slot name="bread_crumb">{{ $bread_crumb->value() }}</x-slot>
    @endif
    <x-slot name="content">
        @livewire('cart-component')





        <div class="">
            <div class=" fixed inset-0 bg-black bg-opacity-50 justify-center items-center z-[55555] p-4 hidden"
                x-show="cart" :class="cart ? ' !flex ' : ' '" x-data="{ tab: 'tab1' }">
                <form class=" bg-white rounded-2xl md:p-8  p-4 max-md:w-full md:min-w-[500px] grid gap-6  ">
                    <div class="flex justify-between items-center text-center gap-4">
                        <div></div>
                        <h2>اختر طريقة التسجيل لتأكيد اتمام الطلب</h2>
                        <div class=" cursor-pointer" @click="cart=false"><i class="fa-solid fa-x"></i></div>
                    </div>
                    <div
                        class=" rounded-2xl grid grid-cols-2 custom__drop__shadow font-semibold text-neutral-600 border border-neutral-100   text-center overflow-hidden max-md:text-sm">
                        <div class=" px-3 py-2 cursor-pointer "
                            :class="tab === 'tab1' ? ' bg-red-50 text-primary' : ' '" @click="tab = 'tab1'">تسجيل
                            الدخول</div>
                        <div class=" px-3 py-2 cursor-pointer "
                            :class="tab === 'tab2' ? ' bg-red-50 text-primary' : ' '" @click="tab = 'tab2'">الدفع
                            السريع</div>
                    </div>

                    <div x-show="tab === 'tab1'" class="grid gap-6">
                        <h2 class="font-semibold text-neutral-600">نبدأ تسجيل دخول الآن</h2>
                        <h3>مستخدم جديد؟ <a href="" class=" text-primary">أنشئ حسابك الان</a></h3>
                        <div class=" grid ">
                            <label class="login" for="">البريد الإلكتروني أو اسم المستخدم</label>
                            <input type="text" placeholder="البريد الإلكتروني أو اسم المستخدم">
                        </div>
                        <div class=" grid ">
                            <label class="login" for="">كلمة السر</label>
                            <div class="relative cent">
                                <input class="w-full drop-shadow-sm" type="password" id="password" name="password"
                                    required="required" autocomplete />
                                <i id="eye"
                                    class="absolute ltr:right-2 rtl:left-2 text-neutral-700 fa-regular fa-eye ltr:ml-20 cursor-pointer hover:text-primary"
                                    onclick="togglePassword( 'password', 'eye' )"></i>
                            </div>
                        </div>
                        <div class=" flex justify-between gap-2 flex-wrap ">
                            <div class=" cent gap-2">
                                <input type="checkbox" name=" remember-me" id="remember-me"
                                    class="w-6 h-6 text-primary bg-gray-100 border-gray-300 rounded focus:ring-red-500">
                                <label for="remember-me"><span
                                        class="login text-sm  capitalize ">تذكرنى
                                        دائما
                                </label>
                            </div>
                            <a href="" class=" text-primary">
                                نسيت كلمة السر ؟
                            </a>
                        </div>
                        <button class=" button-sec">تسجيل الدخول</button>
                        <div class="cent gap-4">
                            <div class=" h-px bg-neutral-200 w-full"></div>
                            <div class="">أو</div>
                            <div class=" h-px bg-neutral-200 w-full"></div>
                        </div>
                        <div class="cent  -my-8">
                            <a href=""><img src="{{ asset('assets/img/google.png') }}" alt=""
                                    class=" max-w-[100]"></a>
                            <a href=""><img src="{{ asset('assets/img/instagram.png') }}" alt=""
                                    class=" max-w-[100]"></a>
                        </div>
                    </div>
                    <div x-show="tab === 'tab2'" class="grid gap-6">
                        <div class=" grid ">
                            <label class="login" for="">الاسم باللغة العربية</label>
                            <input type="text" placeholder="الاسم باللغة العربية">
                        </div>
                        <div class=" grid ">
                            <label class="login" for="">رقم الجوال *</label>
                            <input type="tel" placeholder="  05xxxxxxxx">
                        </div>
                        <div class=" grid ">
                            <label class="login" for="">الجنسية</label>
                            <select name="" id="">
                                <option selected disabled> اختر خيار</option>
                                <option value="1"> SAR</option>
                                <option value="2"> EGY</option>
                            </select>
                        </div>
                        <button class=" button-sec w-2/3 mx-auto">الدفع السريع</button>
                    </div>
                </form>
            </div>
        </div>


    </x-slot>
</x-layout-component>
