<div>
    <section class="container">
        @php
            $diploma_id = isset($page['diploma_system_field']) && array_key_exists('value', $page['diploma_system_field']) ? $page['diploma_system_field']['value'] : null;
            $semesters = App\Models\Semester::where('diploma_id', $diploma_id)->get();
        @endphp
        <div class="relative hide-scroll">
            <div class="grid lg:grid-cols-3 gap-16   content-start   ">
                <div class="lg:col-span-2  hide-scroll ">
                    <div class="bg-lightgray p-8 rounded-2xl ">
                        <div class=" flex justify-between items-center">
                            @php
                                $title = langContent('title');
                                $rating = langContent('rating');
                            @endphp
                            <div class="diploma-title">
                                {{ __('messages.details') }} {{ $page->$title ? $page->$title : $page->title }}
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
                        <div
                            class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] capitalize leading-7">
                            {{ $page->$content_details }}</div>
                        @if ($page->$diploma_objectives)
                            <div class=" h-0.5 opacity-60 bg-neutral-200 mt-5"></div>
                            <div class="diploma-title">{{ __('messages.Detailed objectives of the diploma') }}</div>
                            <div class=" flex items-center gap-8 md:justify-between flex-wrap">
                                @foreach ($page->$diploma_objectives as $diploma_objective)
                                    <div class=" lg:w-[calc(40%)] w-full flex justify-start gap-1">
                                        <img src="{{ asset('assets/img/task_alt_blue.png') }}" alt="task_alt_blue"
                                            class=" w-6 h-6">
                                        <p
                                            class="text-start text-zinc-600 text-base font-normal font-['Open Sans'] leading-[21px]">
                                            {{ $diploma_objective }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mt-5 h-0.5 opacity-60 bg-neutral-200"></div>
                    <div class=" grid gap-8">
                        <div class=" flex justify-between items-center">
                            <h5 class="diploma-title">{{ __('messages.study plan') }}</h5>
                            <button id="general" onclick="openAll()"
                                class="text-center text-primary text-lg font-semibold  capitalize leading-[18px]">
                                <span id="open_all">{{ __('messages.Open all') }}
                                </span>
                                <span id="close_all">
                                    {{ __('messages.Close all') }}
                                </span>
                            </button>
                        </div>
                        @foreach ($semesters as $key => $semester)
                            <div onclick="toggleOpening({{ $key }})">
                                <div class="bg-lightgray  rounded-2xl py-2">
                                    <div class="flex justify-between items-center px-8 cursor-pointer">
                                        <h5 class="diploma-sub-title">
                                            {{ $semester->name }}</h5>
                                        <button
                                            class="text-center text-primary text-lg font-semibold  capitalize leading-[18px]">
                                            <i class="fa-solid fa-window-minimize hidden"
                                                id="your_mini_id_{{ $key }}"></i>
                                            <i class="fa-solid fa-plus" id="your_plus_id_{{ $key }}"></i>
                                        </button>
                                    </div>
                                    <div id="your_element_id_{{ $key }}" class="hidden modalx ">
                                        <div class="my-2 h-0.5 opacity-60 bg-neutral-200"></div>
                                        <div class=" flex flex-col px-8 gap-2 py-2">
                                            @foreach ($semester->semester_products as $product)
                                                <div class=" flex justify-between items-center ">
                                                    <div
                                                        class="text-start text-zinc-600 text-base font-normal  cent gap-1">
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
                <div style="align-self: start; position: sticky; top: 0;">
                    @livewire('registration-form-component', ['diploma' => $page['diploma_system_field'], 'image_diploma' => $page['card_image']['url'], 'title_diploma' => $page['title'], 'title_diploma_ar' => $page['title_ar']])
                </div>
            </div>
        </div>
    </section>





    @php
        $other_diploma_nominations = langContent('other_diploma_nominations');
    @endphp
    @if ($page->$other_diploma_nominations)
        <section class="container">
            <h2 class="section-title text-neutral-800 cent before:bg-center mb-10">
                {{ __("messages.Other women's diplomas you may like") }}</h2>
            <div class="cent flex-wrap gap-8 justify-center">
                @foreach ($page->$other_diploma_nominations as $key => $diploma)
                    @livewire('card-diploma-component', ['key' => $key, 'diploma' => $diploma->toArray()])
                @endforeach
            </div>
        </section>
    @endif


    <x-slot name="customPageScript">
        <script>
            let opened = false;
            let semesterCount = Array.from({
                length: <?php echo count($semesters); ?>
            })

            function toggleOpening(index) {
                let element = getElement(index);
                element.classList.toggle('hidden');
                toggleIcons(index)
            }

            function openAll() {
                opened = !opened;
                let openAll = document.getElementById('open_all');
                let closeAll = document.getElementById('close_all');
                openAll.classList.toggle("hidden", !opened);
                closeAll.classList.toggle("hidden", opened);
                for (let index in semesterCount) {
                    toggleIcons(index, !opened);
                    toggleElementVisibility(index, !opened);
                }
            }

            function toggleButtonVisibility(buttonId, isVisible) {
                let button = getElementById(buttonId);
                button.classList.toggle('hidden', !isVisible);
            }

            function toggleElementVisibility(index, isVisible) {
                let element = getElement(index);
                element.classList.toggle('hidden', !isVisible);
            }

            function toggleIcons(index, isVisible) {
                let miniElement = document.getElementById('your_mini_id_' + index)
                let plusElement = document.getElementById('your_plus_id_' + index)
                miniElement.classList.toggle('!block', isVisible);
                plusElement.classList.toggle('hidden', isVisible);
            }

            function getElement(identifier) {
                return document.getElementById('your_element_id_' + identifier);
            }
            openAll();
        </script>
    </x-slot>
</div>
