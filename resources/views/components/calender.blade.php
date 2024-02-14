<div class="justify-center items-center w-full h-[350px] hidden sm:flex lg:flex xl:hidden 2xl:flex">
    <div id="cleander ">
        <div wire:ignore>
            <input type="text" id="myDatePicker" placeholder="Select Date" class="hidden" wire:model="{{$model ?? 'session_date'}}">
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#myDatePicker", {
        dateFormat: "Y-m-d",
        inline: true,
        weekNumbers: true,
        disableMobile: "true",
        monthSelectorType: "static",
        onChange: function(selectedDates, dateStr) {
            @this.set('session_date', dateStr);
        }
    });

    document.addEventListener('livewire:init', () => {
        Livewire.on('refresh_calender', (event) => {
            flatpickr('#myDatePicker', {
                dateFormat: "Y-m-d",
                inline: true,
                weekNumbers: true,
                disableMobile: "true",
                monthSelectorType: "static",
                onChange: function(selectedDatesUpdate, dateStr) {
                    // console.log("hiiiii");
                    // Livewire.emit('dateSelected', dateStr);
                    // @this.set('session_date', dateStr);
                    Livewire.dispatch('dateSelected', { dateStr:dateStr });
                }
            });
        });
    });
</script>
