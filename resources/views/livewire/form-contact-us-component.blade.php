<div>
    <div class="">
        <div class=" grid gap-8 ">
            <div class="grid">
                <label class="diploma-sub-title" for="name">{{ __('messages.Name') }}<span class="">
                        *</span></label>
                <input type="text" class=" drop-shadow-sm" id="name" wire:model.defer='name'
                    placeholder="{{ __('messages.Name') }}">
                @error('name')
                    <span class="error text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                <label class="diploma-sub-title" for="phone">{{ __('messages.Mobile number') }}<span class="">
                        *</span></label>
                <input type="text" class=" drop-shadow-sm" id="phone" wire:model.defer='phone'
                    placeholder="{{ __('messages.Mobile number') }}">
                @error('phone')
                    <span class="error text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                <label class="diploma-sub-title" for="email">{{ __('messages.email') }}<span class="">
                        *</span></label>
                <input type="email" class=" drop-shadow-sm" id="email" wire:model.defer='email'
                    placeholder="{{ __('messages.email') }}">
                @error('email')
                    <span class="error text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                <label class="diploma-sub-title" for="number">{{ __('messages.age') }}</label>
                <input type="number" class=" drop-shadow-sm" wire:model.defer='age' name="age"
                    placeholder="{{ __('messages.age') }}">
                @error('age')
                    <span class="error text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <button wire:click="send()" wire:loading.attr="disabled" wire:loading.class="opacity-60"
                    class="button-sec sm:w-2/5 w-full">{{ __('messages.send') }}</button>
            </div>
        </div>
    </div>
</div>
