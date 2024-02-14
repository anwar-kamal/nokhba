<section>
    <div class="container grid lg:grid-cols-3  gap-8 w-full overflow-x-auto  content-start  relative">
        <div class=" lg:col-span-2  w-full  overflow-hidden self-start">
            <div class="relative overflow-x-auto   whitespace-nowrap w-full">
                <table class="  whitespace-nowrap w-full  text-sm  text-gray-500  border-separate border-2 rounded-2xl ">
                    <thead
                        class=" uppercase  sm:rounded-lg  text-neutral-700 00   font-semibold text-start border-b rounded-2xl whitespace-nowrap ">
                        <tr class="   tracking-wider text-base ">
                            <th class="px-4 py-2 text-start" scope="col">
                                اسم الدورة
                            </th>
                            <th class="px-4 py-2" scope="col">
                                السعر
                            </th>
                            <th class="px-4 py-2" scope="col">
                                عدد المستويات
                            </th>
                            <th class="px-4 py-2" scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody class=" whitespace-nowrap">
                        @php
                            $totalPrice = 0;
                        @endphp
                        @if (session()->get('my_cart') && session()->get('totalCardQty'))
                            @forelse (session()->get('my_cart') as $model_type => $products)
                                @foreach ($products as $model_id => $product)
                                    @php
                                        $totalPrice += $product['qty'] * $product['price'];
                                    @endphp
                                    <tr class="font-light md:text-lg border-b">
                                        <th scope="row" class="text-gray-800">
                                            <div class="flex gap-2 items-center p-2">
                                                <div>
                                                    <img src="{{ getImage('assets/' . $product['image']) }}"
                                                        class="w-[66px] h-[66px]">
                                                </div>
                                                <h3>{{ $product['title'] }}</h3>
                                            </div>
                                        </th>
                                        <td class=" font-semibold text-neutral-700">
                                            {{ $product['price'] }}
                                        </td>
                                        <td>
                                            <div class="cent gap-4 ">
                                                <button class="w-7 h-7 rounded-full cent border-2 border-neutral-600"
                                                    wire:click="changeQuantity('plus','{{ str_replace('\\', '\\\\', $model_type) }}',{{ $model_id }})"><i
                                                        class="fa-solid fa-plus"></i></button>
                                                <span> {{ $product['qty'] }} </span>
                                                <button class="w-7 h-7 rounded-full cent border-2 border-neutral-600"
                                                    wire:click="changeQuantity('minus','{{ str_replace('\\', '\\\\', $model_type) }}',{{ $model_id }})"><i
                                                        class="fa-solid fa-minus"></i></button>
                                            </div>
                                        </td>
                                        <td class="text-2xl">
                                            <button>
                                                <i class="fa-regular fa-trash-can text-primary"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr class="font-light md:text-lg border-b">
                                    <td class=" font-semibold text-neutral-700">
                                        123456
                                    </td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="lg:flex hidden justify-between gap-2 self-start mt-8">
                <button class="button-primary">العودة الى التسوق</button>
                <button class="button-sec" @click="cart=true">تأكيد الطلب</button>
            </div>
        </div>
        <div class="bg-lightgray md:p-8 p-4 rounded-2xl overflow-hidden  self-start sticky top-0">
            <h3 class="diploma-title">
                {{ __('messages.Invest in yourself') }}
            </h3>
            <form action="submit">
                <div class="gap-4 cent flex flex-wrap">
                    <input type="text" name="promo" id="promo" placeholder="أدخل الرمز هنا">
                    <button id="promo-button" disabled type="submit" class=" button-checked">
                        تطبيق </button>
                </div>
            </form>
            <div class=" h-0.5 opacity-60 bg-neutral-200 my-5"></div>
            <div class=" grid grid-flow-col justify-between gap-3 ">
                <div>
                    <div class="  flex flex-col gap-5">
                        <p class="checkout-sub-title">
                            السعر
                        </p>
                        <p class="checkout-sub-title">
                            قسيمة الخصم
                        </p>

                    </div>
                </div>
                <div>
                    <div class="flex flex-col gap-5 ">
                        <p class="checkout-title">
                            {{ $totalPrice }} ريال سعودي
                        </p>
                        <p class="checkout-title ">
                            -
                        </p>

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
                        {{ $totalPrice }} ريال سعودي
                    </p>
                </div>
            </div>
        </div>
        <div class="flex lg:hidden justify-between gap-2 self-start">
            <button class="button-primary">العودة الى التسوق</button>
            <button class="button-sec" @click="cart=true">تأكيد الطلب</button>
        </div>
    </div>
</section>
