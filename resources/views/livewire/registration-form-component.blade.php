<div >
    <div>
        <div class="bg-lightgray p-8 rounded-2xl "  >
            <h3 class="diploma-title">{{ __('messages.Register now for the Human Resources Diploma') }}</h3>
            <div id="registrationForm" class="flex flex-col gap-8">
                <div class="flex flex-col">
                    <label class="diploma-sub-title" for="name">{{ __('messages.Name') }}<span class="text-red-600">
                            *</span></label>
                    <input type="text" class="@error('name') border-2 border-red-600 @enderror drop-shadow-sm"
                        id="name" wire:model.defer='name' placeholder="{{ __('messages.Name') }}">
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label class="diploma-sub-title" for="phone">{{ __('messages.Mobile number') }}<span
                            class=""> *</span></label>
                    <input type="text" class="@error('phone') border-2 border-red-600 @enderror drop-shadow-sm"
                        id="phone" wire:model.defer='phone' placeholder="{{ __('messages.Mobile number') }}">
                    @error('phone')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" flex flex-col">
                    <label class="diploma-sub-title" for="email">{{ __('messages.email') }}<span
                            class=""> *</span></label>
                    <input type="email" class="@error('email') border-2 border-red-600 @enderror drop-shadow-sm"
                        id="email" wire:model.defer='email' placeholder="{{ __('messages.email') }}">
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" flex flex-col">
                    <label class="diploma-sub-title" for="number">{{ __('messages.age') }}</label>
                    <input type="number" class="drop-shadow-sm" wire:model.defer='age' name="name"
                        placeholder="{{ __('messages.age') }}">
                </div>
                @if (auth('customers')->user())
                    <div>
                        <button wire:click="subscribe"
                            class="button-sec w-full">{{ __('messages.subscribe now') }}</button>
                    </div>
                @else
                    <div>
                        <button wire:click="send" class="button-sec w-full">{{ __('messages.subscribe now') }}</button>
                        {{-- <button onclick="validateAndSubmit()"
                            class="button-sec w-full">{{ __('messages.subscribe now') }}</button> --}}
                    </div>
                @endif
            </div>
            <div class="opacity-80 text-center text-neutral-800 text-base font-normal pt-6">
                {{ __('messages.Get all courses for only 99 EGP/month') }}</div>
        </div>
    </div>
    {{-- <script>
        function validateAndSubmit() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;

            // Reset error messages
            document.getElementById("nameError").classList.add("hidden");
            document.getElementById("phoneError").classList.add("hidden");
            document.getElementById("emailError").classList.add("hidden");

            // Validate and show error messages
            if (name === "") {
                document.getElementById("nameError").classList.remove("hidden");
            }
            if (phone === "") {
                document.getElementById("phoneError").classList.remove("hidden");
            }
            if (email === "") {
                document.getElementById("emailError").classList.remove("hidden");
            }
            if (name !== "" && phone !== "" && email !== "") {
                window.location.href = "/select-plan"
            }
        }
    </script> --}}
</div>
