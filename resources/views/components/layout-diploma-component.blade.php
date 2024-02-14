<div>
    <section class="container hide-scroll ">
        <div class="grid lg:grid-cols-3 gap-[60px] relative h-full ">
            <div class="lg:col-span-2  hide-scroll ">
                <div class="bg-lightgray p-8 rounded-2xl ">
                    <div class=" flex justify-between items-center">
                        @php
                            $title = langContent('title');
                            $rating = langContent('rating');
                        @endphp
                        <div class="diploma-title">
                            {{ __('messages.details') }} {{ $page->$title }}
                        </div>
                        <div class=" text-center text-neutral-800 text-xl font-normal  capitalize leading-tight">
                            <span class="fa fa-star checked text-yellow-500"></span>
                            <span>{{ $page->$rating }}</span>
                        </div>
                    </div>
                    @php
                        $content_details = langContent('content_details');
                        $diploma_objectives = langContent('diploma_objectives');
                    @endphp
                    <div class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] capitalize leading-7">
                        {{ $page->$content_details }}</div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 mt-5"></div>
                    <div class="diploma-title">{{ __('messages.Detailed objectives of the diploma') }}</div>
                    <div class=" flex items-center gap-8 md:justify-between flex-wrap">
                        @foreach ($page->$diploma_objectives as $diploma_objective)
                            <div class=" lg:w-[calc(40%)] w-full flex justify-start gap-1">
                                <img src="{{ getImage('assets/img/task_alt_blue.png') }}" alt="task_alt_blue"
                                    class=" w-6 h-6">
                                <p
                                    class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] leading-[21px]">
                                    {{ $diploma_objective }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5 h-0.5 opacity-60 bg-neutral-200"></div>
                <div x-data="{ opend: false }" class=" grid gap-8">
                    <div class=" flex justify-between items-center">
                        <h5 class="diploma-title">{{ __('messages.study plan') }}</h5>
                        <button class="text-center text-primary text-lg font-semibold  capitalize leading-[18px]"
                            @click="opend=!opend"><span x-show="!opend">{{ __('messages.Open all') }}</span> <span
                                x-show="opend">{{ __('messages.Close all') }}</span></button>
                    </div>

                    @php
                        $diploma_id = App\Models\InstallmentPackage::find($page->diploma_system_field['value'])->installment_package_products->first()->product_id;
                        $semesters = App\Models\Semester::where('diploma_id', $diploma_id)->get();
                    @endphp
                    @foreach ($semesters as $key => $semester)
                        <div
                            @if ($key == 0 || $key == 1) x-data="{ open: true }" @else x-data="{ open: false }" @endif>
                            <div class="bg-lightgray  rounded-2xl py-2" @click="open=!open">
                                <div class="flex justify-between items-center px-8 cursor-pointer">
                                    <h5 class="diploma-sub-title">
                                        {{ $semester->name }}</h5>
                                    <button
                                        class="text-center text-primary text-lg font-semibold  capitalize leading-[18px]">
                                        <i class="fa-solid fa-window-minimize" x-show="open"></i>
                                        <i class="fa-solid fa-plus" x-show="!open"></i>
                                    </button>
                                </div>
                                <div x-show="open ||opend"
                                    x-transition:enter="transition transform ease-out duration-700"
                                    x-transition:enter-start="opacity-0 translate-y-[-100px]"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition transform ease-in duration-700"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-[-100px]">
                                    <div class="my-2 h-0.5 opacity-60 bg-neutral-200"></div>
                                    <div class=" flex flex-col px-8 gap-2 py-2">
                                        @foreach ($semester->semester_products as $product)
                                            <div class=" flex justify-between items-center ">
                                                <div class="text-start text-zinc-600 text-base font-normal  cent gap-1">
                                                    <img src="{{ asset('assets/img/lock.png') }}" alt=""
                                                        class="w-6 aspect-square">
                                                    {{ $product->product->name_ar }}
                                                </div>
                                                <div class="text-start text-zinc-600 text-base font-normal  ">
                                                    {{ $product->product->credit_hours }}
                                                </div>
                                            </div>
                                            @if (!$loop->last)
                                                <div class="my-2 h-0.5 opacity-60 bg-neutral-200"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="lg:sticky top-0 " style="align-self: flex-start">
                @livewire('registration-form-component', ['diploma' => $page['diploma_system_field'], 'image_diploma' => $page['card_image']['url'], 'title_diploma' => $page['title'], 'title_diploma_ar' => $page['title_ar']])
            </div>

        </div>
    </section>

    <section class="container">
        <h2 class="section-title text-neutral-800 cent before:bg-center mb-10">
            {{ __("messages.Other women's diplomas you may like") }}</h2>
        <div class="cent flex-wrap gap-8 justify-center">
            @php
                $other_diploma_nominations = langContent('other_diploma_nominations');
            @endphp
            @foreach ($page->$other_diploma_nominations as $key => $diploma)
                @livewire('card-diploma-component', ['key' => $key, 'diploma' => $diploma->toArray()])
            @endforeach
        </div>
    </section>
</div>
