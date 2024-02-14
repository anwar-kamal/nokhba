<div>
    <div class="bg-white rounded-[32px] overflow-y-auto relative p-6">
        @if ($successMessage)
            <div class="text-lg text-green-600 font-semibold">
                {{ $successMessage }}
            </div>
        @endif
        <div class="overflow-y-auto bg-white">
            <div class="grid md:grid-cols-2 pt-6 gap-6 bg-white">
                <div class="flex flex-col">
                    <label class="login" for="name">{{ __('messages.Name') }}<span class="text-red-600">
                            *</span></label>
                    <input type="text" class=" drop-shadow-sm" id="name" wire:model.defer='name'
                        placeholder="{{ __('messages.Name') }}">
                    @error('name')
                        <span class="text-red-600 text-start">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label class="login" for="phone">{{ __('messages.Mobile number') }}<span
                            class="text-red-600">
                            *</span></label>
                    <input type="text" class="drop-shadow-sm" id="phone" wire:model.defer='phone'
                        placeholder="{{ __('messages.Mobile number') }}">
                    @error('phone')
                        <span class="text-red-600 text-start">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label class="login" for="email">{{ __('messages.email') }}<span
                            class="text-red-600">
                            *</span></label>
                    <input type="email" class=" drop-shadow-sm" id="email" wire:model.defer='email'
                        placeholder="{{ __('messages.email') }}">
                    @error('email')
                        <span class="text-red-600 text-start">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label class="login" for="email">{{ __('messages.Choose the diploma') }}<span
                            class="text-red-600">
                            *</span></label>
                    <select class="text-lg w-full " wire:model.defer="diploma">
                        <option disabled selected> اختار</option>
                        <option value="op1">op1 45465693</option>
                        <option value="op2">op245785875</option>
                    </select>
                        @error('diploma')
                        <span class="text-red-600 text-start">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-start">
                    <button wire:click="send()" class="button-sec w-[80%]">{{ __('messages.send') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
