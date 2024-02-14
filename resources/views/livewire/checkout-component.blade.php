<div>
    <section>
        @php
            $invest_in_ourselves = langContent('invest_in_yourself');
        @endphp
        <div class="grid lg:grid-cols-3 gap-x-12 gap-y-8">
            <div class="lg:col-span-2 grid gap-8">
                <div class="bg-lightgray md:p-8 p-4 rounded-2xl ">
                    <div class="cent">
                        <h3 class="diploma-title">{{ __('messages.Invest in yourself') }}</h3>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6 gap-y-3">
                        @foreach ($page[$invest_in_ourselves] as $invest_in_yourself)
                            <div class=" cent gap-1 py-2">
                                <img src="{{ asset('assets/img/task_alt_blue.png') }}" alt="task_alt_blue" class="w-6 h-6">
                                <p class="text-start text-zinc-600 max-md:text-sm">
                                    {{ $invest_in_yourself }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-lightgray rounded-2xl  md:p-8 p-4">
                    <div class="cent ">
                        <h5 class="diploma-title">{{ __('messages.We offer you flexible prices') }}</h5>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-8">
                        @php
                            $details_two_packages = langContent('details_two_packages');
                        @endphp
                        @foreach ($page[$details_two_packages] as $key => $package)
                            <div id="package{{ $key + 1 }}" value="package{{ $key }}"
                                onclick="selectPackage('package{{ $key + 1 }}')"
                                class=" bg-white rounded-2xl overflow-hidden relative cursor-pointer">
                                @if ($key == 1)
                                    <div class="absolute top-0 z-40 rtl:left-10 ltr:right-10">
                                        <div class="relative w-16 ltr:h-16 h-14 cent overflow-hidden">
                                            <div
                                                class="w-full h-full bg-primary relative z-10 overflow-hidden ltr:py-0.5 py-2">
                                                <p
                                                    class="text-center text-white text-sm font-semibold capitalize leading-[14px]">
                                                    {{ $package['offer'] }}</p>
                                            </div>
                                            <div class="absolute top-[50%] w-32 h-16 bg-[#2B6DF5] rounded-t-full z-50">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="w-full relative">
                                    <img src="{{ asset('assets/img/plan-vector.png') }}" alt="plan"
                                        class="w-full h-40">
                                    <div class="absolute inset-0 cent tracking-wide">
                                        <div class="flex-col justify-center items-center gap-4 inline-flex">
                                            <div
                                                class="text-center text-neutral-200 text-sm font-normal  leading-[14px]">
                                                {{ $package['title'] }}</div>
                                            <div class="justify-end items-center gap-[3px] inline-flex">
                                                <div
                                                    class="text-start text-white text-lg font-extrabold  capitalize leading-[18px]">
                                                    12,99 ريال سعودي</div>
                                            </div>
                                            <div
                                                class="text-start text-neutral-200 text-sm font-normal  leading-[14px]">
                                                تُدفع كمبلغ سنوي قدره<span class=" font-bold"> 1188
                                                </span>ريال
                                                سعودي</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 md:p-4 grid gap-5 py-6">
                                    @foreach ($package['list_content'] as $key => $list_content)
                                        <div class="w-full cent gap-1">
                                            <img src="{{ asset('assets/img/task_alt_blue.png') }}" alt="task_alt_blue"
                                                class="w-6 h-6 aspect-square">
                                            <p class="text-start text-zinc-600 max-md:text-sm  ">
                                                {{ $list_content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-lightgray  rounded-2xl  md:p-8 p-4 ">
                    <div class=" cent">
                        <h5 class="diploma-title ">
                            طرق الدفع
                        </h5>
                    </div>
                    <div class=" flex flex-col gap-4 gap-y-6 py-4">
                        <div class=" flex gap-2 items-center ">
                            <input type="radio" id="cash" name="pay" value="cash" checked />
                            <label
                                class=" justify-between md:justify-start flex gap-2 gap-y-2 text-neutral-800 md:text-base text-xs cursor-pointer "
                                for="cash">الدفع ببطاقة الائتمان من خلال
                                <span class=" flex md:gap-4  gap-2 shrink-0">
                                    <img src="{{ asset('assets/img/visa.png') }}" alt="" class=" max-sm:w-11">
                                    <img src="{{ asset('assets/img/master.png') }}" alt=""
                                        class=" max-sm:w-11">
                                    <img src="{{ asset('assets/img/mada.png') }}" class=" max-sm:w-11" />
                                </span>
                            </label>
                        </div>
                        <div class=" flex gap-2 items-center">
                            <input type="radio" id="divided1" name="pay" value="divided1" />
                            <label
                                class=" justify-between md:justify-start flex gap-2 gap-y-2 text-neutral-800 md:text-base text-xs cursor-pointer "
                                for="divided1">الدفع بنظام التقسيط من خلال
                                <span class=" flex md:gap-4  gap-2">
                                    <img src="{{ asset('assets/img/tamara.png') }}" alt="">
                                </span>
                            </label>
                        </div>
                        <div class=" flex gap-2 items-center">
                            <input type="radio" id="divided2" name="pay" value="divided2" />
                            <label
                                class=" justify-between md:justify-start flex gap-2 gap-y-2 text-neutral-800 md:text-base text-xs cursor-pointer "
                                for="divided2">الدفع بنظام التقسيط من خلال
                                <span class=" flex md:gap-4  gap-2">
                                    <img src="{{ asset('assets/img/tabby.png') }}" alt="">
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-lightgray md:p-8 p-4  rounded-2xl">
                <div>
                    <img src="{{ getImage(Session::get('imageDiploma')) }}" alt=""
                        class="aspect-square w-full rounded-2xl">
                </div>
                @php
                    $titleDiploma = langContent('titleDiploma');
                @endphp
                <div class="cent">
                    <h3 class="diploma-title">{{ Session::get($titleDiploma) }}</h3>
                </div>
                <div class=" h-0.5 opacity-60 bg-neutral-200"></div>
                <h3 class="diploma-title">
                    {{ __('messages.Invest in yourself') }}
                </h3>
                <form action="submit" class=" w-full">
                    <div class="gap-4 grid grid-cols-3 w-full ">
                        <div class=" col-span-2">
                            <input type="text" name="promo" id="promo" class=" w-full">
                        </div>
                        <button id="promo-button" disabled type="submit" class=" button-checked">
                            تطبيق </button>
                    </div>
                </form>
                <div class=" h-0.5 opacity-60 bg-neutral-200 my-5"></div>
                @php
                    $subscribeDiploma = App\Models\InstallmentPackage::find(Session::get('subscribeDiploma'));
                @endphp
                <div class=" grid grid-flow-col justify-between gap-3 ">
                    <div>
                        <div class="  flex flex-col gap-5">
                            <p class="checkout-sub-title">
                                السعر
                            </p>
                            <p class="checkout-sub-title">
                                ضريبية
                            </p>
                            {{-- @if ($promo)
                                <p class="checkout-sub-title ">
                                    قسيمة الخصم
                                </p>
                                @endif --}}
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col gap-5">
                            <p class="checkout-title">
                                {{ $subscribeDiploma->total_amount }} ريال سعودي
                            </p>
                            <p class="checkout-title">
                                {{ $subscribeDiploma->total_amount }} ريال سعودي
                            </p>
                            {{-- @if ($promo)
                                <p class="checkout-title">-
                                    <span class=" text-primary"> 150.00 ريال سعودي</span>
                                </p>
                                @endif --}}
                        </div>
                    </div>

                </div>
                <div class=" h-0.5 opacity-60 bg-neutral-200 my-5"></div>
                <div class=" grid grid-flow-col justify-between gap-3 ">
                    <div>
                        <p class="checkout-sub-title">
                            الأجمالي
                        </p>
                    </div>
                    <div>
                        <p class="checkout-title">
                            250.29 ريال سعودي
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-2/3">
            <div class="py-8 flex gap-4">
                <input type="checkbox" id="terms-select-checkbox" name="terms-select-checkbox"
                    class="w-6 h-6 text-primary bg-gray-100 border-gray-300 rounded focus:ring-red-500 " />
                <div class="">
                    <label for="terms-select-checkbox"><span
                            class="text-neutral-800 text-base font-semibold  capitalize leading-none">أوافق
                            علي </span>
                    </label>
                    <button @click="modal=!modal"
                        class="text-red-800 text-base font-semibold  capitalize leading-none">الشروط
                        والأحكام</button>
                                </div>
                </div>
            <div class=" cent">
                <button disabled id="terms-select-plan" class=" button-checked  md:w-1/2">
                    الذهاب الي صفحة الدفع</button>
            </div>
        </div>
    </section>





</div>
