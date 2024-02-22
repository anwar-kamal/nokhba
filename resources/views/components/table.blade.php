<div class=" md:col-span-2 overflow-hidden {{ isset($with_responsive) ? 'max-sm:hidden' : "" }}">
    <div class="overflow-x-auto shadow-md sm:rounded-lg whitespace-nowrap {{ isset($with_responsive) ? 'relative' : "table-container w-full" }}">
        <table
            class="whitespace-nowrap w-full md:w-full text-sm  text-gray-500 dark:text-gray-400 border-spacing-2 overflow-x-auto ">
            <thead
                class=" uppercase  sm:rounded-lg bg-primary  text-white dark:text-gray-400   font-semibold text-start ">
                {{ $head ?? '' }}
            </thead>
            <tbody>
                {{ $body ?? '' }}
            </tbody>
        </table>
    </div>
</div>

