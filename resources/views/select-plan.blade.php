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
    <x-slot name="content">
        <main class="container" x-data="{ modal: false }">
            {{-- @livewire('model-component') --}}
            @livewire('checkout-component', ['page' => $page->toArray()])
        </main>
    </x-slot>
</x-layout-component>
