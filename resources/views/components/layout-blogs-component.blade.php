<div>
    <div class="container">
        <div class="flex">
            <span class="date"><img src="{{ asset('assets/img/date.png') }}"
                    alt=""><span>{{ \Carbon\Carbon::parse($page->date)->translatedFormat('d F Y') }}</span></span>
        </div>
        <div class="grid lg:grid-cols-3 gap-[60px]">
            <div class="lg:col-span-2">
                <div class="bg-gray-50 p-8 rounded-2xl grid gap-10">
                    @php
                        $full_list = langContent('full_list');
                        $full_content = langContent('full_content');
                    @endphp
                    @foreach ($page->$full_content as $content)
                        <div>
                            <div class="diploma-title">{{ $content->title }}</div>
                            <div class="text-start text-zinc-600 text-base font-normal capitalize leading-7">
                                {!! $content->content !!}</div>
                        </div>
                    @endforeach
                    @foreach ($page->$full_list as $full)
                        <div>
                            <div class="diploma-title">{{ $full->title }}</div>
                            @foreach ($full->list_conten as $list)
                                <div class="text-start text-zinc-600 text-base font-normal capitalize leading-7">
                                    {{ $list }}</div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
