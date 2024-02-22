<div>
    <div class="fixed inset-0 bg-[#0000008c] z-[51] flex justify-center cent p-5 " x-show="!modal">
        <div
            class="max-w-md lg:max-w-3xl w-full max-h-[90%] bg-white rounded-[32px] overflow-y-auto relative hide-scroll">
            <div>
                <div class="sticky top-0 mx-auto w-full bg-white md:py-5 md:px-6 px-2 py-3 ">
                    <a href="javascript:history.back()" class=" text-end cursor-pointer"><i
                            class="fa-solid fa-x md:fa-xl font-extrabold"></i></a>
                    <div class="cent">
                        <h4
                            class=" text-center md:text-start text-neutral-800 text-xl font-semibold  capitalize leading-tight py-0">
                            {{ __('messages.Terms and Conditions') }}</h4>
                    </div>
                </div>
                <div class="overflow-y-auto bg-white py-4 md:px-8 px-5 ">
                    <div class=" bg-white">
                        <h5 class=" diploma-sub-title">{{ __('messages.Admission requirements') }}</h5>
                        <div class="setting_terms">
                            {!! $setting->value !!}
                        </div>
                    </div>
                </div>
                <div class=" sticky bottom-0 mx-auto w-full bg-white p-4 ">
                    <div class="pb-4 flex gap-4">
                        <input type="checkbox" id="modal-terms" name="modal-terms"
                            class="w-6 h-6 text-primary bg-gray-100 border-gray-300 rounded focus:ring-red-500 " />
                        <label for="modal-terms" class=" text-primary"><span
                                class="text-base font-semibold font-['Open Sans'] capitalize leading-none">{{ __('messages.I agree to the terms and conditions') }}</span></label>
                    </div>
                    <div class="cent">
                        <button @click="modal =! modal" disabled id="modal-button-checked"
                            class=" button-checked  w-1/3">{{ __('messages.confirmation') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
