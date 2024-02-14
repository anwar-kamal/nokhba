<x-layout-component>
    <x-slot name="header">true</x-slot>
    <x-slot name="footer">true</x-slot>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">{{ $seo_title ?? $page->title_ar }}</x-slot>
    @else
        <x-slot name="title">{{ $seo_title ?? $page->title }}</x-slot>
    @endif
    <x-slot name="customPageScript">
        <script>
            // Validate checkbox input
            function toggleButtonState(checkboxId, buttonId) {
                const checkbox = document.getElementById(checkboxId)
                const button = document.getElementById(buttonId)

                // Add an event listener to the checkbox
                checkbox.addEventListener('change', function() {
                    updateButtonAppearance(checkbox.checked, button)
                })
            }

            // Call the function with specific check box IDs and button IDs

            toggleButtonState('modal-terms', 'modal-button-checked')
            toggleButtonState('terms-select-checkbox', 'terms-select-plan')

            //Select Package
            function selectPackage(packageId) {
                // Set the selected package value
                var selectedValue = document.getElementById(packageId)
                document.getElementById('package1').style.border = 'none'
                document.getElementById('package2').style.border = 'none'
                // Show the selected package
                document.getElementById(packageId).style.border = '3px solid #9F1916'
            }
        </script>
    </x-slot>
    <x-slot name="content"  >
        <main class="container" x-data="{ modal: false }">
            <div class="fixed inset-0 bg-[#0000008c] z-50 flex justify-center cent p-5 "  x-show="!modal">
                <div class="max-w-md lg:max-w-3xl w-full max-h-[90%] bg-white rounded-[32px] overflow-y-auto relative hide-scroll">
                    <div>
                        <div class="sticky top-0 mx-auto w-full bg-white md:py-5 md:px-6 px-2 py-3 ">
                            <a href="javascript:history.back()" class=" text-end cursor-pointer"><i
                                    class="fa-solid fa-x md:fa-xl font-extrabold"></i></a>
                            <div class="cent">
                                <h4
                                    class=" text-center md:text-start text-neutral-800 text-xl font-semibold  capitalize leading-tight py-0">
                                    الشروط والأحكام</h4>
                            </div>
                        </div>
                        <div class="overflow-y-auto bg-white py-4 md:px-8 px-5 ">
                            <div class=" bg-white">
                                <h5 class=" diploma-sub-title"> شروط القبول</h5>
                                <p
                                    class="text-zinc-600 text-base font-normal font-['Open Sans'] capitalize leading-normal">
                                    1. ان تكون المتدربة حاصلة على شهادة الثانوية العامة او ما يعادلها للإلحاق
                                    بالدبلوم
                                    التدريبي. <br>
                                    2. صوره من المؤهل الدراسي مع الأصل للمطابقة. <br>
                                    3. صوره من الهوية الوطنية للسعوديين ومواطني دول مجلس التعاون الخليجي او
                                    الإقامة
                                    النظامية ساريه
                                    المفعول لغير السعوديين <br>
                                    4. 3 صور شخصيه حديثه. <br>
                                    5. تعبئه كافة الحقول في نموذج التسجيل الرسمي بشكل صحيح وواضح. <br>
                                    6. التوقيع بالموافقة على جميع البنود في نموذج التسجيل الرسمي. <br>
                                    7. و-كتابه الاسم باللغة الإنجليزية بشكل صحيح وواضح. <br>
                                    8. معادلة الوثائق الدراسية الصادرة من خارج المملكة العربية السعودية من قبل
                                    الجهات
                                    المختصة داخل
                                    المملكة قبل قبولهم بالمنشأة التدريبية <br>
                                    9. ألا يكون هناك اعاقه تمنع المتدربة من اتقان المهارة. <br>
                                    10. تزويد المركز بالبريد الالكتروني للتواصل. <br>
                                </p>
                            </div>
                            <div class=" bg-white">
                                <h5 class=" diploma-sub-title">الشروط العامة</h5>
                                <p
                                    class="text-zinc-600 text-base font-normal font-['Open Sans'] capitalize leading-normal">
                                    1. ان تكون المتدربة حاصلة على شهادة الثانوية العامة او ما يعادلها للإلحاق
                                    بالدبلوم
                                    التدريبي. <br>
                                    2. صوره من المؤهل الدراسي مع الأصل للمطابقة. <br>
                                    3. صوره من الهوية الوطنية للسعوديين ومواطني دول مجلس التعاون الخليجي او
                                    الإقامة
                                    النظامية ساريه
                                    المفعول لغير السعوديين <br>
                                    4. 3 صور شخصيه حديثه. <br>
                                    5. تعبئه كافة الحقول في نموذج التسجيل الرسمي بشكل صحيح وواضح. <br>
                                    6. التوقيع بالموافقة على جميع البنود في نموذج التسجيل الرسمي. <br>
                                    7. و-كتابه الاسم باللغة الإنجليزية بشكل صحيح وواضح. <br>
                                    8. معادلة الوثائق الدراسية الصادرة من خارج المملكة العربية السعودية من قبل
                                    الجهات
                                    المختصة داخل
                                    المملكة قبل قبولهم بالمنشأة التدريبية <br>
                                    9. ألا يكون هناك اعاقه تمنع المتدربة من اتقان المهارة. <br>
                                    10. تزويد المركز بالبريد الالكتروني للتواصل. <br>
                                </p>
                            </div>
                        </div>
                        <div class=" sticky bottom-0 mx-auto w-full bg-white p-4 ">
                            <div class="pb-4 flex gap-4">
                                <input type="checkbox" id="modal-terms" name="modal-terms"
                                    class="w-6 h-6 text-primary bg-gray-100 border-gray-300 rounded focus:ring-red-500 " />
                                <label for="modal-terms" class=" text-primary"><span
                                        class=" text-base font-semibold font-['Open Sans'] capitalize leading-none">أوافق
                                        علي </span><span
                                        class="text-base font-semibold font-['Open Sans'] capitalize leading-none">الشروط
                                        والأحكام</span></label>
                            </div>
                            <div class="cent">
                                <button @click="modal =! modal" disabled id="modal-button-checked"
                                    class=" button-checked  w-1/3">تأكيد</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @livewire('checkout-component', ['page' => $page->toArray()])
        </main>
    </x-slot>
</x-layout-component>
