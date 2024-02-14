<div>
    <section class="cent flex-wrap gap-8 justify-center container">
        @if ($url == 'courses')
            @foreach ($products as $key => $course)
                @livewire('card-course-component', ['key' => $key, 'course' => $course->toArray()])
            @endforeach
        @elseif ($url == 'women-diplomas')
            @foreach ($products as $key => $diploma)
                @livewire('card-diploma-component', ['key' => $key, 'diploma' => $diploma->toArray()])
            @endforeach
        @endif
    </section>
</div>
