<li class="hover:bg-primary hover:text-white rounded-xl text-center sm:p-3 cursor-pointer  sm:text-base  text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]
    {{(isset($selected) && $selected) ? 'bg-red-50 text-red-900' : ''}}" wire:click="{{$func}}" x-on:click="$wire.$refresh()">
     {{$label}}
</li>
