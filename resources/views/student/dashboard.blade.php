<x-student-dashboard-layout>
    @if (App::getLocale() == 'ar')
        <x-slot name="title_ar">لوحة التحكم</x-slot>
    @else
        <x-slot name="title">control panel</x-slot>
    @endif

    @livewire("student-dashboard-component")
</x-student-dashboard-layout>
